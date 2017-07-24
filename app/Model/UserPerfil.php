<?php
App::uses('AppModel', 'Model');
/**
 * Projeto Model
 *
 * @property Cliente $Cliente
 * @property ProjetoStatus $ProjetoStatus
 * @property User $User
 * @property Empresa $Empresa
 * @property Chamado $Chamado
 * @property Orcamento $Orcamento
 */
class UserPerfil extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'perfil_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'empresa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Perfil' => array(
			'className' => 'Perfil',
			'foreignKey' => 'perfil_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		
	);
	
	
	public function getPerfis($empresa_id, $user_id){
		$conditions = array('UserPerfil.empresa_id' => $empresa_id, 'UserPerfil.user_id' => $user_id);
		$user_perfis = $this->find('all', array('conditions' => $conditions, 'recursive' => 1));
		if($user_perfis){
			return $user_perfis;
		}else return null;
	}
	
	public function melhorPerfil($perfis_usuario){
		$perfil_atual = 0;
                if(count($perfis_usuario))
		foreach($perfis_usuario as $perfil){
			if($perfil_atual == 0) 
				$perfil_atual = $perfil['UserPerfil']['perfil_id'];
			else		
				if($perfil['UserPerfil']['perfil_id'] < $perfil_atual)
					$perfil_atual = $perfil['UserPerfil']['perfil_id'];
		}
		
		return $perfil_atual;
	}

    public function getUsersEmpresa(){
        $users_id = array();

        $users = $this->find('all', array('conditions' => array('UserPerfil.empresa_id' => $_SESSION['Empresa']['id'], 'UserPerfil.perfil_id < ' => 5, 'UserPerfil.perfil_id > ' => 1 ), 'recursive' => -1));
        if($users){
            foreach($users as $user){
                $users_id[] = $user['UserPerfil']['user_id'];
            }
            return $users_id;
        }

        return null;
    }
}
