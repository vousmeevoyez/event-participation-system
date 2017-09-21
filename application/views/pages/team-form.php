
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Buat Tim</h2>
                            <form method="POST" action="<?=base_url('team/add');?>">
                                <div class="field" id="form-alert">
                                </div>
                                <div class="field">
                                    <label for="name">Nama Tim</label>
                                    <input type="text" name="team_name" id="name" placeholder="Nama Tim" />
                                </div>
                                <div class="field">
                                    <label for="competition">Kompetisi</label>
                                    <select name="team_type">
                                        <option value="sd">Software Development</option>
                                        <option value="bp">Business Plan</option>
                                        <option value="sm">Short Movie</option>
                                    </select>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="DAFTAR TIM" /></li>
                                </ul>
                            </form>
                            </div>
                        </header>
                    </section>
