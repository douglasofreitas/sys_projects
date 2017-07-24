<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $recursive = 0;

    function find($conditions = null, $fields = array(), $order = null, $recursive = null) {
        $doQuery = true;
        // check if we want the cache
        if (!empty($fields['cache'])) {
            $cacheConfig = null;
            // check if we have specified a custom config
            if (!empty($fields['cacheConfig'])) {
                $cacheConfig = $fields['cacheConfig'];
            }
            $cacheName = $this->name . '-' . $fields['cache'];
            // if so, check if the cache exists
            $data = Cache::read($cacheName, $cacheConfig);
            if ($data == false) {
                $data = parent::find($conditions, $fields,
                    $order, $recursive);
                Cache::write($cacheName, $data, $cacheConfig);
            }
            $doQuery = false;
        }
        if ($doQuery) {
            $data = parent::find($conditions, $fields, $order,
                $recursive);
        }
        return $data;
    }

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        
        App::import('Controller', 'App');
        $appController  = new AppController();
        $appController->constructClasses();
    }
    
    //manipulação de valor
    public function valorFormatBeforeSave($valor) {
        return str_replace(',', '.', $valor);
    }	
    public function valorFormatAfterFind($valor) {
        return number_format($valor, 2, ',', '');
    }
    
    //manipulador de datas
    public function dateFormatAfterFind($dateString, $somente_data = false) {
        if($somente_data)
            $text = date('d/m/Y', strtotime($dateString));
        else
            $text = date('d/m/Y - H:m', strtotime($dateString));
        $text = str_replace('- 00:00', '', $text);
        return $text;
    }
    public function dateFormatBeforeSave($dateString) {
        list($d, $m, $y) = preg_split('/\//', $dateString);
        $dateString = sprintf('%4d%02d%02d', $y, $m, $d);
        return date('Y-m-d', strtotime($dateString)); // Direction is from 
    }
    
    /** 
     * Incremento de numero N de meses na data atual, formato dd/mm/aaaa 
     * return dd/mm/aaaa
     */
    public function incrementarData($dateString, $incremento){
        list($d, $m, $y) = preg_split('/\//', $dateString);

        $new_date = strtotime('+'.$incremento.' month', strtotime($y.'-'.$m.'-'.$d));

        return date('d/m/Y', $new_date);

    }
}
