<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>HIFEST BACKEND LOGIN PAGE</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom_login/css/style.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom_login/css/custom.css');?>" />
		<script src="<?=base_url('assets/custom_login/js/modernizr.custom.63321.js');?>"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
			
			<header>
				<h1>HIFEST EVENT</h1>
				<h3>BACKEND SYSTEM</h3>
			</header>
			
			<section class="main">
				<?php 
				$attributes = array('class' => 'form-1');
				echo form_open('admin/login',$attributes); 
				if(!empty($error_msg)){
					echo '<p style="color:palevioletred;">'.$error_msg.'</p>';
				}?>
					<p class="field"><?php echo validation_errors('<p style="color:palevioletred;">','</p>'); ?></p>
					<p class="field">
						<input type="text" name="username" placeholder="Username">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="password" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
					<br>
					<p class="copyright"><a href="https://github.com/vousmeevoyez">DEV BY <i>VOUSMEEVOYEZ</i> &copy; 2017</a></p>
			</section>
        </div>
        <div class="footer">
        	<div class="footer-row"></div>
        </div>
    </body>
</html>