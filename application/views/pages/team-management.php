                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <div class="box alt">
                                    <div class="well profile">
                                        <div class="col-sm-12">
                                            <div class="col-xs-12 col-sm-6">
                                                <h2 class="custom-heading">Informasi Tim</h2>
                                                <p><strong>Nama Tim: </strong><?php echo $team_name; ?></p>
                                                <p><strong>Kompetisi: </strong><?php echo $team_type; ?></p>
                                                <p><strong>Ketua: </strong><?php echo $team_leader; ?></p>
                                                <p><strong>Status Tim: </strong><?php echo $team_status; ?></p>
                                                <p><strong>Kode Join: </strong><?php echo $pk_team;?></p>
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
                                            <div class="col-xs-12 col-sm-4 emphasis">                    
                                                <a href="<?=base_url('participant/add_member_form');?>"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Tambah Anggota</button></a>
                                            </div>
                                            <?php if($team_status == 'Telah Diverifikasi'){?>
                                            <div class="col-xs-12 col-sm-4 emphasis">                    
                                                <a href="<?=base_url('participant/proposal');?>"><button class="btn btn-info btn-block"><span class="fa fa-plus-circle"></span> Submit Dokumen</button></a>
                                            </div>
                                            <?php } ?>
                                            <div class="col-xs-12 col-sm-4 emphasis">                    
                                                <a href="<?=base_url('participant/faq');?>"><p><small>Frequently Asked Questions</small></p></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                    </section>
