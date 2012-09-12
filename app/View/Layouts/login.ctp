<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>		
		<?php echo $title_for_layout; ?>
	</title>
        
        <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
                echo $this->Html->css('login');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        
    </head>
    <body class="login">
        <h1>Hotel Booking</h1>
        <?php echo $this->Session->flash();?>
        <div id="container" class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
    </body>
</html>