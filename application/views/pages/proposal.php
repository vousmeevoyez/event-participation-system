
				<!-- Wrapper -->
					<section id="wrapper">
										<header>
											<div class="inner">
												<h2 class="competition-heading">SUBMIT DOKUMEN</h2>
													<p class="competition-desc">Silahkan lampirkan file yang ingin disubmit untuk kompetisi HIFEST 2017.</p>
													<p class="competition-desc">Jenis file yang diperbolehkan adalah doc, docx, pdf</p>
													<p class="competition-desc">Ukuran file yang diperbolehkan adalah 2 MB</p>
													<?echo $error?>
      												<?php echo form_open_multipart('file/do_upload');?> 
												<form method="" action="">
													<div class="field">
														<input type="file" name="userfile"/>
													</div>
													<ul class="actions">
														<li><input type="submit" value="Upload berkas" /></li>
													</ul>
												</form>
											</div>
										</header>

						<!-- Content
							<div class="wrapper">
								<div class="inner">
									<section>
										<h2 class="comp-heading">PRIZE</h2>
											<div class="box alt">
													<div class="row uniform prize-row">
														<div class="4u"><span class="image fit"><img src="<?=base_url('assets/pages/img/trophy.png');?>" alt="" class="prize" /></span>
														</div>
														<div class="4u">
															<h1>1ST PLACE</h1>
															<h1>IDR 4.000.000</h1>
														</div>
													</div>
													<hr>
													<div class="row uniform prize-row">
														<div class="4u"><span class="image fit"><img src="<?=base_url('assets/pages/img/trophy2.png');?>" alt="" class="prize" /></span>
														</div>
														<div class="4u">
															<h1>2ND PLACE</h1>
															<h1>IDR 2.000.000</h1>
														</div>
													</div>
													<hr>
													<div class="row uniform prize-row">
														<div class="4u"><span class="image fit"><img src="<?=base_url('assets/pages/img/trophy3.png');?>" alt="" class="prize" /></span>
														</div>
														<div class="4u">
															<h1>3RD PLACE</h1>
															<h1>IDR 1.000.000</h1>
														</div>
													</div>
													<hr>
											</div>
									</section>
									<br>
									<section>
										<h2 class="comp-heading">TIMELINE</h2>
											<div class="table-wrapper">
												<table>
													<tbody>
														<tr>
															<td>Pendaftaran</td>
															<td>1 Agustus - 1 Oktober 2017.</td>
														</tr>
														<tr>
															<td>Pelaksanaan</td>
															<td>13 November - 14 November 2017.</td>
														</tr>
													</tbody>
												</table>
											</div>
									</section>
									<section>
										<a href="<?=base_url('pages/view/signup');?>" class="button special fit">Register Your Team Now!!!</a>
									</section>
									</div>
									</div>
									</section>-->
