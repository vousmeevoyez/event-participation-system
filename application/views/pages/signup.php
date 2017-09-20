<?php 
            echo form_open('participant/signup'); 
?>
				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2 class="major" style="text-align: center;">DAFTAR</h2>
								<div class="field" id="form-alert">
									<?php echo validation_errors('<p style="color:red;">','</p>'); ?>
								</div>
								<div class="field">
									<label for="name">Full Name</label>
									<input type="text" name="user_name" id="name" placeholder="Nama Lengkap" />
									<span class="form-alert" id="span-error-name"></span>
								</div>
								<div class="field">
									<label for="email">Email</label>
									<input type="email" name="user_email" id="email" placeholder="Alamat email" />
									<span class="form-alert" id="span-error-email"></span>
								</div>
								<div class="field">
									<label for="password">Password</label>
									<input type="Password" name="user_password" placeholder="*******" />
									<span class="form-alert" id="span-error-password"></span>
								</div>
								<ul class="actions">
									<li><input type="submit" value="REGISTER" /></li>
								</ul>
								<p><a href="<?=base_url('participant/login');?>">Sudah punya akun?</a></p>
							</div>
						</header>
					</section>
