<?php

/**
 * Tipo de Habitacion
 *
 * @author Arturo Rojas
 */
class Tipo extends AppModel{
    public $useTable = 'tipos';
    public $primaryKey = 'id_tipo';
    public $displayField = 'nombre';
    
    public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'El tipo de habitación es un campo requerido'
            )
    ));
}

?>
