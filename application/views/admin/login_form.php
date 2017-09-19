<?php
if (isset($this->session->userdata['logged_in'])) {
	header("location: http://localhost/ci-hifest/auth/auth_check");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>HIFEST BACKEND LOGIN PAGE</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/custom_login/css/style.css');?>" />
		<script src="<?=base_url('assets/custom_login/js/modernizr.custom.63321.js');?>"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
			
			<header>
				<h1>HIFEST <strong>2017</strong></h1>
				<h3>BACKEND SYSTEM</h3>
				
			</header>
			
			<section class="main">
				<form class="form-1" action="<?=base_url('admin/auth_check');?>" method="POST">
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
				</form>
			</section>
        </div>
    </body>
</html>