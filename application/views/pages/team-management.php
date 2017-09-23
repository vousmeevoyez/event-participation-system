                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <?php 
                                        if(!empty($error_msg)){
                                            echo '<p style="color:palevioletred;">'.$error_msg.'</p>';
                                        }
                                ?>
                                <div class="box alt">
                                    <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-6">
                                                <h2 class="custom-heading">Informasi Tim</h2>
                                                <p><strong>Nama Tim: </strong><br><?php echo $team_name; ?></p>
                                                <p><strong>Kompetisi: </strong><br><?php echo $team_type; ?></p>
                                                <p><strong>Ketua: </strong><br><?php echo $team_leader; ?></p>
                                                <p><strong>Status Tim: </strong><br><?php echo $team_status; ?></p>
                                                <p><strong>Kode Join: </strong><?php echo $pk_team;?></p>
                                                <p><strong>Jumlah Anggota: </strong><?php echo $member_count;?></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h2 class="custom-heading">Anggota</h2>
                                                <ol>
                                                <?php foreach ($member_data as $member_item):?>
                                                    <li><?php echo $member_item->participant_name; ?></li>
                                                <?php endforeach?>
                                                </ol>
                                            </div>              
                                        </div>            
                                        <div class="col-xs-12 divider text-center">
                                            <!--SHORT MOVIE TEAM MANAGEMENT ADD-->
                                            <?php if($team_type == 'Short Movie' && $member_count < 6){?>
                                                <div class="col-xs-12 col-sm-12 emphasis">                    
                                                    <a href="<?=base_url('participant/add_member_form');?>"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Tambah Anggota</button></a>
                                                </div>
                                            <!--SOFTWARE DEV & BUSINESS PLAN TEAM MANAGEMENT ADD-->
                                            <?php }else if($team_type != 'Short Movie' && $member_count < 3){ ?>
                                                <div class="col-xs-12 col-sm-12 emphasis">                    
                                                    <a href="<?=base_url('participant/add_member_form');?>"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Tambah Anggota</button></a>
                                                </div>
                                            <!--- CHANGE TEAM MANAGEMENT IF THEY ARE VERIFIED-->
                                            <?php }else if($team_status == 'Telah Diverifikasi'){?>
                                                <div class="col-xs-12 col-sm-6 emphasis">                    
                                                    <button class="btn btn-danger btn-block"><span class="fa fa-close"></span> Tim Penuh</button>
                                                </div>
                                                    <!--- VERIFIED AND SUBMIT THEIR DOCUMENT-->
                                                    <?php if($team_doc != NULL ){?>
                                                        <div class="col-xs-12 col-sm-6 emphasis">                    
                                                            <button class="btn btn-success btn-block"><span class="fa fa-check"></span> Sudah Submit</button>
                                                        </div>
                                                        <!--- VERIFIED AND NOT SUBMIT THEIR DOCUMENT AND TEAM TYPE IS SHORT MOVIE-->
                                                    <?php }else if($team_type == 'Short Movie'){?>
                                                     <div class="col-xs-12 col-sm-6 emphasis">                    
                                                            <a href="<?=base_url('participant/submit_video_form');?>"><button class="btn btn-info btn-block"><span class="fa fa-plus-circle"></span> Submit URL Video</button></a>
                                                        </div>
                                                    <!--- VERIFIED AND NOT SUBMIT THEIR DOCUMENT AND TEAM TYPE IS SHORT MOVIE-->
                                                    <?php }else {?>
                                                     <div class="col-xs-12 col-sm-6 emphasis">                    
                                                            <a href="<?=base_url('participant/submit_form');?>"><button class="btn btn-info btn-block"><span class="fa fa-plus-circle"></span> Submit Dokumen</button></a>
                                                        </div>
                                                    <?php }?>
                                            <!--- TEAM FULL & WAITING PAYMENT-->
                                            <?php } else{?>
                                                <div class="col-xs-12 col-sm-6 emphasis">                    
                                                    <button class="btn btn-danger btn-block"><span class="fa fa-close"></span> Tim Penuh</button>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 emphasis">                    
                                                    <a href="<?=base_url('participant/payment');?>"><button class="btn btn-primary btn-block"><span class="fa fa-money"></span> Konfirmasi Pembayaran</button></a>
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                    </section>
