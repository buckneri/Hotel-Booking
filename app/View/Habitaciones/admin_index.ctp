<div class="page-header">
    <h1>Lista de Habitaciones</h1>
    <?php echo $this->Session->flash('flash', array('element' => 'failure'));?>
</div>

<table class="table table-striped">
    <tbody>
        <?php foreach($habitaciones as $habitacion):?>
        <tr class="fade in">
            <td>
                <?php echo $habitacion['Habitacion']['numero_habitacion'];?>
            </td>
            <td>
                <?php echo $habitacion['Tipo']['nombre'];?>
            </td>
            <td>
                <?php echo $habitacion['Habitacion']['descripcion'];?>
            </td>
            <?php if($habitacion['Habitacion']['por_noche'] == '1'):?>
            <td>
                <?php echo '&cent;' . $habitacion['Habitacion']['precio_habitacion'];?>
            </td>
            <td>
                <?php echo 'por noche';?>
            </td>
            <?php else:?>
                <td>
                    <?php if(isset($habitacion['Habitacion']['precio_menores']) && $habitacion['Habitacion']['precio_menores'] != 0):?>
                        <?php echo 'Adultos: &cent;' . $habitacion['Habitacion']['precio_adultos'] . '<br/>';?>
                        <?php echo 'Ni&ntilde;os: &cent;' . $habitacion['Habitacion']['precio_menores'] . '';?>
                    <?php else:?>
                        <?php echo '&cent;' . $habitacion['Habitacion']['precio_adultos'];?>
                    <?php endif;?>
                </td>
                <td>
                    <?php echo 'por persona, por noche';?>
                </td>
            <?php endif;?>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>