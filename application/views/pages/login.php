<?php
if (isset($this->session->userdata['logged_in'])) {
	header("location: http://localhost/ci-hifest/participant/check");
}
?>
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2 class="major" style="text-align: center;">LOGIn</h2>
							<form action="<?=base_url('participant/check');?>" method="POST">
								<div class="field">
									<label for="email">Email</label>
									<input type="email" name="username" id="email" placeholder="Alamat email" />
								</div>
								<div class="field">
									<label for="email">Password</label>
									<input type="Password" name="password" placeholder="*******" />
								</div>

								<ul class="actions">
									<li><input type="submit" value="LOGIN" /></li>
								</ul>
							</form>
							</div>
						</header>
					</section>