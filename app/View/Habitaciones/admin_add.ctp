<?php
    $this->start('script');
    echo $this->Html->script('Habitaciones/admin/add', false);
    $this->end();
?>

<div class="page-header">
    <h1>Agregar una nueva habitaci&oacute;n</h1>
    <blockquote>
        <p>Los campos marcados con un <strong>*asterizco</strong> son obligatorios</p>        
    </blockquote>
    <?php echo $this->Session->flash('flash', array('element' => 'failure'));?>
</div>

<?php echo $this->Form->create('Habitacion', array('id' => 'frmHabitacion', 'class' => 'form-vertical'));?>
<fieldset>
    <div class="control-group">
        <label class="control-label required" for="data[Habitacion][numero_habitacion]">*N&uacute;mero de Habitaci&oacute;n</label>
        <div class="controls">
            <?php echo $this->Form->input('numero_habitacion', array('label' => false, 'div' => false, 'id' => 'txtNumeroHabitacion'));?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label required" for="data[Habitacion][id_tipo]">*Tipo de Habitaci&oacute;n</label>
        <div class="controls">
            <?php echo $this->Form->input('id_tipo', array('label' => false, 'div' => false, 'id' => 'ddTipo', 'options' => $tipos, 'empty' => 'Tipos de Habitación...'));?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label required" for="data[Habitacion][descripcion]">*Descripci&oacute;n</label>
        <div class="controls">
            <?php echo $this->Form->input('descripcion', array('label' => false, 'div' => false, 'id' => 'txtDescripcion', 'cols' => 40));?>
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label required" for="data[Habitacion][max_adultos]">*Total de adultos</label>
        <div class="controls">
            <?php echo $this->Form->input('max_adultos', array('label' => false, 'div' => false, 'id' => 'txtMaxAdultos', 'value' => 1));?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="data[Habitacion][max_menores]">Total de ni&ntilde;os</label>
        <div class="controls">
            <?php echo $this->Form->input('max_menores', array('label' => false, 'div' => false, 'id' => 'txtMaxMenores'));?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="data[Habitacion][por_noche]">Precio</label>
        <div class="controls">
            <input type="radio" name="precioPor" id="rdoPrecioPorPersona" value="1" <?php echo ($this->data['Habitacion']['por_persona'] == '1' ? 'checked' : '');?>/>Por Persona&nbsp;
            <input type="radio" name="precioPor" id="rdoPrecioPorNoche" value="0" <?php echo ($this->data['Habitacion']['por_noche'] == '1' ? 'checked' : '');?> />Por Noche
            <?php echo $this->Form->input('por_noche', array('label' => false, 'div' => false, 'id' => 'hdnPorNoche', 'type' => 'hidden', 'value' => '1'));?>
            <?php echo $this->Form->input('por_persona', array('label' => false, 'div' => false, 'id' => 'hdnPorPersona', 'type' => 'hidden', 'value' => '0'));?>
        </div>
    </div>
    <div id="divPrecioPorPersona">
        <div class="control-group">
            <label class="control-label required" for="data[Habitacion][precio_adultos]">*Precio para Adultos</label>
            <div class="controls">
                <?php echo $this->Form->input('precio_adultos', array('label' => false, 'div' => false, 'id' => 'txtPrecioAdultos'));?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="data[Habitacion][precio_menores]">Precio para ni&ntilde;os</label>
            <div class="controls">
                <?php echo $this->Form->input('precio_menores', array('label' => false, 'div' => false, 'id' => 'txtPrecioMenores'));?>
            </div>
        </div>
    </div>
    <div id="divPrecioPorHabitacion">
        <div class="control-group">
            <label class="control-label required" for="data[Habitacion][precio_habitacion]">*Precio por noche</label>
            <div class="controls">
                <?php echo $this->Form->input('precio_habitacion', array('label' => false, 'div' => false, 'id' => 'txtPrecioHabitacion'));?>
            </div>
        </div>
    </div>
</fieldset>
<div class="span7">
    <button type="submit" class="btn btn-success" id="btnGuardar">
        <i class="icon-white icon-ok"></i>
        <span>Guardar</span>
    </button>
    <button type="submit" class="btn btn-primary" id="btnGuardarConFotos">
        <i class="icon-white icon-arrow-right"></i>
        <span>Guardar y Agregar Fotos...</span>
    </button>
    <a href="<?php echo $this->Html->url(array('action' => 'index', 'admin' => true));?>" class="btn btn-warning" id="lnkCancelar">
        <i class="icon-white icon-ban-circle"></i>
        <span>Cancelar</span>
    </a>
    <?php echo $this->Form->input('redirect_to', array('label' => false, 'div' => false, 'id' => 'hdnRedirectTo', 'value' => 'index', 'type' => 'hidden'));?>
</div>
<?php echo $this->Form->end();?>