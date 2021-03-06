
<?php echo $this->Form->create('Usuario', array('id' => 'frmLogin', 'class' => 'form-horizontal'))?>
<fieldset class="custom-align-left">
    <div class="control-group">
        <label class="control-label" for="data[Usuario][email]">Email</label>
        <div class="controls">
            <?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'id' => 'txtEmail', 'class' => 'input-large', 'size' => 30));?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="data[Usuario][password]">Password</label>
        <div class="controls">
            <?php echo $this->Form->input('password', array('label' => false, 'div' => false, 'id' => 'txtPassword', 'class' => 'input-large', 'size' => 30, 'type' => 'password'));?>
        </div>
    </div>
    <div class="control-group">        
        <div class="controls">            
            <button type="submit" class="btn btn-success">
                <i class="icon-lock icon-white"></i>
                <span>Login</span>
            </button>
            <label class="checkbox remember"><?php echo $this->Form->input('persist', array('label' => false, 'div' => false, 'id' => 'chkPersist', 'type' => 'checkbox'));?>Mantener sesi&oacute;n abierta</label>
        </div>        
    </div>
</fieldset>
<?php echo $this->Form->end();?>