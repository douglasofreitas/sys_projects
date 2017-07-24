<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    var $paginate = array(
        'limit' => 50
    );
    var $empresa_core = null;
    public $components = array(
        'Session'
        , 'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
            'authorize' => array('Controller'),
            'authError' => 'Did you really think you are allowed to see that?'
        )
        , 'Image'
        , 'Email'
        //, 'DebugKit.Toolbar'
    );
    
    public function isAuthorized($user) {
        
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return true;
    }
    
    public function redirect($url, $status = null, $exit = true) {
        $url = '/'.$this->empresa_core['Empresa']['chave_url'].'/'.$url;
        parent::redirect($url, $status = null, $exit = true);
    }
    
    public function beforeFilter() {
        
        //obter os dados da empresa e deixar no controller
        if(!empty($this->request->params['empresa'])){
            //echo 'Espresa: "'.$this->request->params['empresa'].'"';
            $this->loadModel('Empresa');
            $this->empresa_core = $this->Empresa->getEmpresaByChave($this->request->params['empresa']);
            
            if(empty($this->empresa_core)){
                if($this->request->params['empresa'] != 'padrao'){
                    //$this->redirect('/padrao/pages/home');
                }
            }else{
                //configurar helpers
                $this->helpers['Html']['empresa_chave'] = $this->empresa_core['Empresa']['chave_url'];
                $this->helpers['Form']['empresa_chave'] = $this->empresa_core['Empresa']['chave_url'];
            }
        }
        $this->Auth->authError = "Erro no usuário ou senha!";
        
        
        //verifica se o usuário esta na empresa em que autenticou, pois pode mudar de url
        if(!empty($_SESSION['Empresa']['chave_url']))
        if($this->empresa_core['Empresa']['chave_url'] != $_SESSION['Empresa']['chave_url']){
                $this->redirect('/users/logout');
        }
        
        if(!empty($_SESSION['Empresa']))
            $_SESSION['Empresa'] = $this->empresa_core['Empresa'];
        
        //obter a url completa do site
        if(!empty($_SERVER['HTTP_REFERER'])){
            $full_url = $_SERVER['HTTP_REFERER'];
            $full_url = substr($full_url,0, strrpos($full_url, $this->empresa_core['Empresa']['chave_url'])).$this->empresa_core['Empresa']['chave_url'];
        }else $full_url = 'sysprojetos';
        $this->set('full_url', $full_url);

        
        //obter dados relativos ao usuário
        $user_auth = $this->Session->read('User');
        if(!empty($user_auth)){
            $this->loadModel('Chamado');
            $num_chamados_desenvolvimento = $this->Chamado->getChamadosDesenvolvimento($this->Session->read('User.id'), 'count');
            $num_chamados_analise = $this->Chamado->getChamadosAnalise('count');
            $this->set('num_chamados_desenvolvimento', $num_chamados_desenvolvimento);
            $this->set('num_chamados_analise', $num_chamados_analise);
        }
        
        $this->set('empresa_core', $this->empresa_core);
        $this->set('user_auth', $user_auth);
        //enviar os perfis do usuário
        //if($this->Session->check('UserPerfil'))
        $this->set('user_perfil', $this->Session->read('UserPerfil'));
        $this->set('perfil_atual', $this->Session->read('perfil_atual'));
        
        $this->set('menu_area', 'home');
    }
    
    
    
    //funções gerais do sistema
    
    function verifica_login(){
        if(empty($_SESSION['Empresa']))
            $this->redirect ('/users/login');
    }
    
    function codificar($string){ 
        if((isset($string)) && (is_string($string))){ 
            $enc_string = base64_encode($string); 
            $enc_string = str_replace("=","",$enc_string);
            $enc_string = strrev($enc_string);
            $md5 = md5($string); 
            $enc_string = substr($md5,0,3).$enc_string.substr($md5,-3);
        }else{ 
            $enc_string = "Parâmetro incorreto ou inexistente!";
        } 
        return $enc_string; 
    } 
    function descodificar($string){
        if((isset($string)) && (is_string($string))){ 
            $ini = substr($string,0,3);
            $end = substr($string,-3);
            $des_string = substr($string,0,-3);
            $des_string = substr($des_string,3);
            $des_string = strrev($des_string); 
            $des_string = base64_decode($des_string); 
            $md5 = md5($des_string); 
            $ver = substr($md5,0,3).substr($md5,-3);
            if($ver != $ini.$end){
                $des_string = "Erro na desencriptação!"; 
            }
        }else{
            $des_string = "Parâmetro incorreto ou inexistente!"; 
        } 
        return $des_string; 
    } 
    
    /** 
    * uploads files to the server 
    * @params: 
    *      $folder     = the folder to upload the files e.g. 'img/files' 
    *      $formdata   = the array containing the form files 
    *      $itemId     = id of the item (optional) will create a new sub folder 
    * @return: 
    *      will return an array with the success of each file upload 
    */  
    function uploadFiles($folder, $formdata, $itemId = null, $names = array(), $resize = false, $lado_max = 200, $filename_mini = null, $lado_max_mini = 100) {  
	
            // setup dir names absolute and relative  
            $folder_url = WWW_ROOT.$folder;  
            $rel_url = $folder;  
            
            // create the folder if it does not exist  
            if(!is_dir($folder_url)) {  
                    mkdir($folder_url);  
            }  

            // if itemId is set create an item folder  
            if($itemId) {  
                    // set new absolute folder  
                    $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
                    // set new relative folder  
                    $rel_url = $folder.'/'.$itemId;  
                    // create directory  
                    if(!is_dir($folder_url)) {  
                            mkdir($folder_url);  
                    }  
            }  

            // list of permitted file types,
            $permitted = array('image/jpg', 'image/jpe', 'image/jpeg', 'image/gif', 'image/bmp', 'image/png' );  

            // loop through and deal with the files  
            foreach($formdata as $key => $file) {  
                    if(!empty($names[$key])) {
                            $filename = $names[$key];
                    }else{
                            // replace spaces with underscores 
                            $filename = str_replace(' ', '_', $file['name']);
                    }
                    // assume filetype is false  
                    $typeOK = true;  

//                    // check filetype is ok
//                    if(in_array($file['type'], $permitted)) 
//                            $typeOK = true;  

                    // if file type ok upload the file  
                    if($typeOK) {  
                            // switch based on error code  
                            switch($file['error']) {  
                                    case 0:  
                                            $url = $folder_url.DS.$filename;  
                                            $success = move_uploaded_file($file['tmp_name'], $url);  
                                            // if upload was successful  
                                            if($success) {  
                                                    // save the url of the file  
                                                    $result['urls'][] = $url;  
                                                    
                                                    //diminuir imagem
                                                    if($resize){
                                                        $this->Image->resize_img($url, $lado_max, $url) ;
                                                    }
                                                    
                                                    //criar miniatura
                                                    if(!empty($filename_mini)){
                                                        $url_mini = $folder_url.'/'.$filename_mini;  
                                                        $result['urls'][] = $url_mini;  
                                                        $this->Image->resize_img($url, $lado_max_mini, $url_mini) ;
                                                    }
                                            } else {  
                                                    $result['errors'][] = "Error uploaded $filename. Please try again.";  
                                            }  
                                            break;  
                                    case 3:  
                                            // an error occured  
                                            $result['errors'][] = "Error uploading $filename. Please try again.";  
                                            break;  
                                    default:  
                                            // an error occured  
                                            $result['errors'][] = "System error uploading $filename. Contact webmaster.";  
                                            break;  
                            }  
                    } elseif($file['error'] == 4) {  
                            // no file was selected for upload  
                            $result['nofiles'][] = "No file Selected";  
                    } else {  
                            // unacceptable file type  
                            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: png, jpg, bmp, gif.";  
                    }  
            }  
            return $result;  
    } 

    function deleteFiles($folder, $itemId = null, $names = array()) {
            // setup dir name 
            $folder_url = WWW_ROOT.$folder;  

            // if itemId is set create an item folder  
            if($itemId) {  
                    // set new absolute folder  
                    $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
            }  

            // loop through and delete files  
            foreach($names as $filename) {  
                    $url = $folder_url.'/'.$filename;  
                    if(file_exists($url)) unlink($url);
            }
            return true;  
    }

    function envia_email($to_name, $to_email, $assunto, $template_email, $array_mesclagem = array()){

        return false;
    }
    
    function debugVar($obj){
            echo '<pre>';
            print_r($obj);
            echo '</pre>';
    }
    
}
