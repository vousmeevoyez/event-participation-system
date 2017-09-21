				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
    							<div class="box alt">
    								<div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-12">
                                                <h2 class="custom-heading">Informasi Akun</h2>
                                                <p><strong>Nama: </strong><br><?php echo $participant_name;?></p>
                                                <p><strong>Email: </strong><br><?php echo $participant_email;?></p>
                                                <p><strong>University: </strong><br><?php echo $participant_university;?></p>
                                                <p><strong>Phone: </strong><br><?php echo $participant_msisdn;?></p>
                                                <p><strong>ID Card: </strong><br><?php echo $participant_idcard;?></p>
                                                <p><strong>Team: </strong><br><?php echo $team;?></p>
                                                <p><strong>Posisi: </strong><br><?php echo $position;?></p>
                                                <p><strong>Status Akun: </strong><br><?php echo $status;?> </p>
                                            </div>             
                                        </div>            
                                        <div class="col-xs-12 divider text-center">
                                            <!--<div class="col-xs-12 col-sm-4 emphasis">                    
                                                <a href="<?=base_url('participant/add_team_form');?>"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Buat Tim</button></a>
                                            </div>
                                           <div class="col-xs-12 col-sm-4 emphasis">                    
                                                <a href="<?=base_url('participant/join_team_form');?>"><button class="btn btn-info btn-block"><span class="fa fa-plus-circle"></span> Gabung Tim</button></a>
                                            </div>-->
                                             <div class="col-xs-12 col-sm-12 emphasis">                    
                                                <a href="<?=base_url('participant/faq');?>"><p><small>Frequently Asked Questions</small></p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
							</div>
					</section>
