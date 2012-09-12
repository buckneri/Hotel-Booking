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
                echo $this->Html->css('admin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        
    </head>
    <body class="admin">
        <div id="container" class="container">
            <div class="header">
                <div class="logo">
                    <!-- Add logo image here-->
                </div>
                <ul class="nav-menu">
                    <li><a href="#">Menu Item 1</a></li>
                    <li><a href="#">Menu Item 2</a></li>
                    <li><a href="#">Menu Item 3</a></li>                    
                </ul>
                <div class="user-info">
                    Logged in as Admin (admin) <?php echo $this->Html->link('Logout', '/admin/logout');?>
                </div>
            </div>
            <div class="content-box">
                <?php echo $this->fetch('content'); ?>
            </div>
            <div class="footer">&copy; Mercranet 2012</div>
        </div>
    </body>
</html>