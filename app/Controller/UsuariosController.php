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
        $this->layout = 'login_new';
        $this->set('title_for_layout', 'Administración');
        if($this->request->is('post')){
            // Hacer login del usuario. Se usa por defecto los datos del request
            // El nombre de usuario admin esta reservado
            if($this->request->data['Usuario']['email'] == 'admin'){
                // Para evitar errores de validacion, se modifica el nombre de
                // usuario antes de hacer login
                $this->request->data['Usuario']['email'] = 'admin@admin.com';
            }
            if($this->request->data['Usuario']['persist'] == '1'){
                // Mantener sesion activa por 6 horas
                // Esto sucede en AppController::beforeFilter()
                $this->Cookie->write('PersistSession', true);
            }
            else{
                $this->Cookie->write('PersistSession', false);
            }
            if($this->Auth->login()){
                // Login satisfactorio
                $this->redirect(array('action' => 'index', 'admin' => true));
            }
            else{
                if($this->request->data['Usuario']['email'] == 'admin@admin.com'){
                    $this->request->data['Usuario']['email'] = 'admin';
                }
                $this->Session->setFlash('Nombre de usuario o clave incorrectos');
            }
        }
    }
    
    function admin_index(){
        $this->layout = 'admin';
        $this->layout = 'admin_new';
        $session = $this->Session->read();
        $expires = new DateTime('@'.$session['Config']['time']);
        $expires->setTimezone(new DateTimeZone("America/Costa_Rica"));
        $this->set('sessionExpire', $expires->format('d/m/Y h:i:s A'));        
    }
    
    function admin_logout(){
        $this->Auth->logout();
        $this->Cookie->delete('PersistSession');
        $this->redirect($this->Auth->logoutRedirect);
    }
    
    function admin_pass($user){
        $this->autoRender = false;
        debug($this->Auth->password('admin'));
    }
}

?>
