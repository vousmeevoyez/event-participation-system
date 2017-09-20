
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Lengkapi Informasi Anda</h2>
                            <form method="POST" action="<?=base_url('team/add');?>">
                                <div class="field" id="form-alert">
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
                                    <label for="name">Dokumen bukti mahasiswa (KRS/KTM)</label>
                                    <input type="file" name="participant_doc"/>
                                    <p class="upload-desc">Ukuran file maksimum 2MB (JPG/JPEG/PNG/PDF)</p>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="LANJUTKAN" /></li>
                                </ul>
                            </form>
                            </div>
                        </header>
                    </section>
