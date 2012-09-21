<?php

/**
 * FotosController
 *
 * @author Arturo Rojas
 */
class FotosController extends AppController{
    
    public $uses = array('Foto');
    
    function beforeFilter() {
        parent::beforeFilter();
    }
    
    function isAuthorized(){
        return true;
    }
    
    // Despliega el formulario para cargar fotos por habitacion
    function admin_habitacion($idHabitacion){
        if($this->request->is('ajax')){
            // Funciones AJAX
            $this->layout = 'ajax';
            // Objeto JSON de prueba
            $object = array();
            $this->set('object', $object);
            $this->render('json');
        }
        else{
            // Llamada normal
            $this->layout = 'admin_new';
        }
    }        
}

?>
