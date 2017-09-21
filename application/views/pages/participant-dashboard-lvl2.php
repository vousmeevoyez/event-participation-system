                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <div class="box alt">
                                    <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-8">
                                                <h2 class="custom-heading">Hi <?php echo $participant_name;?> :)</h2>
                                                <p><strong>Email: </strong><?php echo $participant_email;?></p>
                                                <p><strong>Team: </strong><?php echo $team;?></p>
                                                <p><strong>Kompetisi: </strong><?php echo $team_type;?></p>
                                                <p><strong>Status Akun: </strong> <?php echo $status;?> </p>
                                            </div>             
                                        </div>            
                                        <div class="col-xs-12 divider text-center">
                                            <div class="col-xs-12 col-sm-6 emphasis">                    
                                                <a href="<?=base_url('participant/team_management');?>"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Atur Tim</button></a>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 emphasis">                    
                                                <a href="<?=base_url('participant/account_info');?>"><p><small>Account Information</small></p></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                    </section>
