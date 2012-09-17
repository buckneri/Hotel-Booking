<?php

/**
 * Habitaciones
 *
 * @author Arturo Rojas
 */
class HabitacionesController extends AppController{
    public $uses = array('Habitacion');
    
    function beforeFilter(){
        parent::beforeFilter();
    }
    
    function isAuthorized(){
        return true;
    }
    
    /**
     * Despliega el listado de habitaciones 
     */
    function admin_index(){
        $this->layout = 'admin_new';
        $this->set('habitaciones', $this->Habitacion->find('all'));
    }
    
    /**
     * Agrega una nueva habitación y redirecciona a la sección de fotos 
     * 
     */
    function admin_add(){
        $this->layout = 'admin_new';
        
        if($this->request->is('post')){
            // Agrega una nueva habitación
            $this->Habitacion->create();
            // Hacemos esto para evitar errores de validacion. Los campo no son
            // requeridos pero si viene una cadena nula, la validacion numerica
            // falla
            if($this->request->data['Habitacion']['max_menores'] == ''){
                $this->request->data['Habitacion']['max_menores'] = 0;
            }
            if($this->request->data['Habitacion']['precio_menores'] == ''){
                $this->request->data['Habitacion']['precio_menores'] = '0';
            }
            // Si el ususario selecciona la opcion de precio por persona, el
            // campo precio_adultos se convierte en requerido
            if($this->request->data['Habitacion']['por_persona'] == '1'){
                $this->Habitacion->validator()->add('precio_adultos', 'required',array(
                    'rule' => 'notEmpty',
                    'message' => 'El precio para adultos es un campo requerido'
                ));
                // Evitamos errores de validacion en el precio por noche
                if($this->request->data['Habitacion']['precio_habitacion'] == ''){
                    $this->request->data['Habitacion']['precio_habitacion'] = 0;
                }
            }
            else{
                // En caso contrario, nos aseguramos que no hayan errores de validacion
                if($this->request->data['Habitacion']['precio_adultos'] == ''){
                    $this->request->data['Habitacion']['precio_adultos'] = 0;
                }
            }
            if($this->Habitacion->save($this->request->data)){
                $idHabitacion = $this->Habitacion->getLastInsertID();
                if($this->request->data['Habitacion']['redirect_to'] == 'fotos'){
                    // Se lleva al usuario a la administracion de fotos por habitacion
                    $this->redirect(array('controller' => 'Fotos', 'action' => 'habitacion', 'admin' => true, $idHabitacion));
                }
                else{
                    // Se lleva al usuario al listado de habitaciones
                    $this->redirect(array('action' => 'index', 'admin' => true));
                }
            }
            else{
                $this->Session->setFlash('Ops! Ha ocurrido un error al guardar la habitación. Por favor revise los datos del formulario e inténtelo una vez más');
                $this->set('tipos', $this->Habitacion->Tipo->find('list'));                
            }
        }
        else{
            // Despliega el formulario
            $this->request->data['Habitacion']['por_persona'] = '0';
            $this->request->data['Habitacion']['por_noche'] = '1';
            $this->set('tipos', $this->Habitacion->Tipo->find('list'));
        }
    }
}

?>
