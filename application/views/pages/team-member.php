
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Data Anggota</h2>
                                <div class="field" id="form-alert">
                                </div>
                                <?php 
                                    echo form_open_multipart('participant/add_member_form'); 
                                ?>
                                <?php 
                                        if(!empty($error_msg)){
                                            echo '<p style="color:palevioletred;">'.$error_msg.'</p>';
                                        }
                                ?>
                                <?php echo validation_errors('<p style="color:palevioletred;">','</p>'); ?>
                                <div class="field">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="participant_name" id="name" placeholder="Nama Lengkap" />
                                </div>
                                <div class="field">
                                    <label for="name">Email</label>
                                    <input type="email" name="participant_email" id="name" placeholder="Alamat Email" />
                                </div>
                                <div class="field">
                                    <label for="name">Universitas</label>
                                    <input type="text" name="participant_university" placeholder="Nama Universitas / Instansi" />
                                </div>
                                <div class="field">
                                    <label for="name">No Telepon</label>
                                    <input type="text" name="participant_msisdn" placeholder="Nomor Handphone" />
                                </div>
                                <div class="field">
                                    <label for="name">No Identitas</label>
                                    <input type="text" name="participant_id" placeholder="KTP/SIM/KTM" />
                                </div>
                                <div class="field">
                                    <label for="name">Pas Foto</label>
                                    <input type="file" name="participant_photo"/>
                                    <p class="upload-desc">Ukuran file maksimum 2MB (JPG/JPEG/PNG)</p>
                                </div>
                                <div class="field">
                                    <label for="name">Dokumen KRS</label>
                                    <input type="file" name="participant_doc"/>
                                    <p class="upload-desc">Ukuran file maksimum 2MB (JPG/JPEG/PNG)</p>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="LANJUTKAN" /></li>
                                </ul>
                            </div>
                        </header>
                    </section>
