<?php
App::uses('AppModel', 'Model');
/**
 * ChamadoStatus Model
 *
 * @property Chamado $Chamado
 */
class ChamadoStatus extends AppModel {


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Chamado' => array(
            'className' => 'Chamado',
            'foreignKey' => 'chamado_status_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    //status dos chamados
    //1	Em análise
    //2	Em desenvolvimento
    //3	Pendente com o cliente
    //4	Concluído
    //5	Aguardando teste
    //6	Teste concluído
    //7	Cancelado


    function getFormSelect($conditions = array()){
        $form_select = array();

        $resultado = $this->find('all', array('conditions' => $conditions, 'recursive' => '-1'));

        foreach($resultado as $item){
            $form_select[$item['ChamadoStatus']['id']] = $item['ChamadoStatus']['nome'];
        }

        return $form_select;
    }


}
