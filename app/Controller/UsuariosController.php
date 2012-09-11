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
    
    
    function admin_login(){
        $this->layout = 'login';
        $this->set('title_for_layout', 'Administración');
    }
}

?>
