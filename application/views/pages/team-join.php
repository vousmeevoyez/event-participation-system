        <?php 
            echo form_open('participant/join_team_form'); 
        ?>
                <!-- Wrapper -->
                    <section id="wrapper">
                        <header>
                            <div class="inner">
                                <h2 class="major" style="text-align: center;">Gabung Tim</h2>
                                <?php 
                                        if(!empty($error_msg)){
                                            echo '<p style="color:palevioletred;">'.$error_msg.'</p>';
                                        }
                                ?>
                                <?php echo validation_errors('<p style="color:palevioletred;">','</p>'); ?>
                                <div class="field" id="form-alert">
                                </div>
                                <div class="field">
                                    <label for="name">Kode Gabung Tim</label>
                                    <input type="text" name="fk_team" placeholder="Kode join tim" />
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" value="Gabung Tim" /></li>
                                </ul>
                            </form>
                            </div>
                        </header>
                    </section>
