
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Gabung Tim</h2>
                            <form method="POST" action="<?=base_url('participant/join_team');?>">
                                <div class="field" id="form-alert">
                                </div>
                                <div class="field">
                                    <label for="name">Kode Gabung Tim</label>
                                    <input type="text" name="fk_team" id="name" placeholder="Kode join tim" />
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="Gabung Tim" /></li>
                                </ul>
                            </form>
                            </div>
                        </header>
                    </section>
