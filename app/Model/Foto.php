<?php

/**
 * Fotos
 * 
 * @author Arturo Rojas 
 */

class Foto extends AppModel{
    public $useTable = 'fotos';
    public $primaryKey = 'id_foto';
    
    public $belongsTo = array(
        'Habitacion' => array(
            'className' => 'Habitacion',
            'foreignKey' => 'id_habitacion'
        )
    );
}

?>
