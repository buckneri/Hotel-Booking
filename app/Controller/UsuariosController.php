<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuariosController
 *
 * @author Jose Cortes
 */
class UsuariosController extends AppController{
    
    function beforeFilter() {
        $this->Auth->allow('admin_pass','admin_login');
        parent::beforeFilter();
    }
    
    function isAuthorized(){
        return true;
    }
    
    function admin_login(){
        $this->layout = 'login';
        $this->set('title_for_layout', 'Administración');
        if($this->request->is('post')){
            // Hacer login del usuario. Se usa por defecto los datos del request
            // El nombre de usuario admin esta reservado
            if($this->request->data['Usuario']['email'] == 'admin'){
                // Para evitar errores de validacion, se modifica el nombre de
                // usuario antes de hacer login
                $this->request->data['Usuario']['email'] = 'admin@admin.com';
            }
            if($this->Auth->login()){
                // Login satisfactorio
                $this->flash('Login satisfactorio', array('action' => 'index'));
            }
            else{
                if($this->request->data['Usuario']['email'] == 'admin@admin.com'){
                    $this->request->data['Usuario']['email'] = 'admin';
                }
                $this->Session->setFlash('Nombre de usuario o clave incorrecto');
            }
        }
    }
    
    function admin_index(){
        $this->layout = 'admin';
    }
    
    function admin_pass($user){
        $this->autoRender = false;
        debug($this->Auth->password('admin'));
    }
}

?>
