<?php

/**
 * Habitacion
 *
 * @author Arturo Rojas
 */
class Habitacion extends AppModel{
    public $useTable = 'habitaciones';
    public $primaryKey = 'id_habitacion';
    
    public $validate = array(
        'numero_habitacion' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'El número de habitación es un campo requerido'
            )
        ),
        'id_tipo' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'El tipo de habitacion es un campo requerido'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Tipo de habitación incorrecto'
            )
        ),
        'descripcion' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message'=> 'La descripción es un campo requerido'
            )
        ),
        'max_adultos' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'El número máximo de ocupantes adultos es requerido'
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Número de ocupantes incorrecto'
            )
        ),
        'max_menores' => array(
            'numeric' => array(
                'rule' => 'numeric',                
                'message' => 'Número de ocupantes incorrecto'
            )
        ),        
        'precio_habitacion' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Precio incorrecto'
            )
        ),
        'precio_adultos' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Precio incorrecto'
            )
        ),
        'precio_menores' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Precio incorrecto'
            )
        )
    );
    
    public $belongsTo = array(
        'Tipo' => array(
            'className' => 'Tipo',
            'foreignKey' => 'id_tipo'
        )
    );
}

?>
