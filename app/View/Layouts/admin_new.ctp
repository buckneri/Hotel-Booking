<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>		
		<?php echo $title_for_layout; ?>
	</title>
        
        <?php
		echo $this->Html->meta('icon');

                
                echo $this->Html->css('jquery.qtip', null, array('inline' => true));                
                echo $this->Html->css('style', null, array('inline' => true));
		echo $this->Html->css('bootstrap_min', null, array('inline' => true));
                echo $this->Html->css('bootstrap_min_responsive', null, array('inline' => true));                
                
                echo $this->Html->script('jquery-1.7.2', true);
                echo $this->Html->script('jquery-ui-1.8.21.custom.min', true);
                echo $this->Html->script('jquery.qtip', true);
                echo $this->Html->script('global', true);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#">Hotel Booking v1.0</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Habitaciones</a>
                            </li>                            
                        </ul>
                        <ul class="user-info">
                            <li class="active"><span>Logged in as Admin (admin)</span></li>
                            <li><?php echo $this->Html->link('Logout', '/admin/logout');?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php echo $this->fetch('content');?>
        </div>
    </body>
</html>