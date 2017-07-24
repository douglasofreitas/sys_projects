<?php
App::uses('AppModel', 'Model');
/**
 * ProjetosUser Model
 *
 * @property User $User
 * @property Projeto $Projeto
 */
class ProjetosUser extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'projeto_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'Projeto' => array(
			'className' => 'Projeto',
			'foreignKey' => 'projeto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function getUsersRelatedByProjetos($user_id){

        // Primeiro passo, obter os projetos relacionados com o usuário atual
        $projeto_id = $this->getProjetosByUser($user_id);

        // Segundo passo: obter os usuários relacionados aos projetos encontrados.
        $users = $this->find('all', array('conditions' => array('ProjetosUser.projeto_id' => $projeto_id)));
        $user_id = array();

        if($users){
            foreach($users as $user){
                $user_id[] = $user['User']['id'];
            }

            return $user_id;
        }


        return null;
    }

    public function getProjetosByUser($user_id){
        $projetos = $this->find('all', array('conditions' => array('ProjetosUser.user_id' => $user_id)));
        $projeto_id = array();

        if($projetos){
            foreach($projetos as $projeto){
                $projeto_id[] = $projeto['Projeto']['id'];
            }

            return $projeto_id;
        }

        return null;
    }

}
