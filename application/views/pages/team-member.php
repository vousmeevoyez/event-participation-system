
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Tambah Anggota Tim</h2>
                            <form method="POST" action="<?=base_url('participant/add_member');?>">
                                <div class="field" id="form-alert">
                                </div>
                                <div class="field">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="participant_name" id="name" placeholder="Nama Lengkap" />
                                </div>
                                <div class="field">
                                    <label for="name">Email</label>
                                    <input type="email" name="participant_email" id="name" placeholder="Alamat Email" />
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="Tambah anggota TIM" /></li>
                                </ul>
                            </form>
                            </div>
                        </header>
                    </section>
