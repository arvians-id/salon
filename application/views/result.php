<!-- session forward chaining -->
<?php if ($this->session->userdata('id')) : ?>
    <!-- KELUHAN PELANGGAN=============================== -->
    <section id="keluhan" class="whitetext" style="padding:50px 0;background-color:white;">
        <section id="keluhan" class="services margintop60 container">
            <div class="sow-headline">
                <h1>KELUHAN PELANGGAN</h1>
                <div class="decoration">
                    <div class="decoration-inside">
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif ($this->session->flashdata('error') || form_error('jawaban[]')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php if (form_error('jawaban[]')) : ?>
                        <?= form_error('jawaban[]') ?>
                    <?php else : ?>
                        <?= $this->session->flashdata('error'); ?>
                    <?php endif; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="section-body">
                <div class="card">
                    <div class="card-header"><br />
                        <!-- <h4>Hasil Keluhan</h4> -->
                    </div>
                    <div style="color: black;">
                        <div class="card-body text-center">
                            <?php if ($getSolusi != "Kode solusi tidak ditemukan") : ?>
                                <h4>Adapun solusinya, sebagai berikut.</h4>
                                <h5><?= $getSolusi['judul'] ?></h5>
                                <p class="text-center"><?= $getSolusi['solusi'] ?></p>
                            <?php else : ?>
                                <p>Maaf, solusi tidak ditemukan.</p>
                            <?php endif; ?>
                            <a href="<?= base_url() ?>#keluhan" class="btn btn-primary" style="width:200px;"><i class=""></i> Konsultasi ulang</a>
                            <a href="<?= base_url() ?>#reservasi" class="btn" id="btn-reservasi">Reservasi</a>

                        </div>
                    </div>
                </div>
                <div class=" card">
                    <div class="card-header">
                        <h4 style="color: white; text-align:center;">Riwayat Pertanyaan</h4>
                    </div>
                    <div style="color: black;">
                        <div class="card-body">
                            <ul class="list-group">
                                <?php if ($getJawaban != null) : ?>
                                    <?php for ($i = 0; $i < count($getJawaban); $i++) : ?>
                                        <?php if ($getJawaban[$i] != null) : ?>
                                            <li class="list-group-item" id="iya"><?= $getJawaban[$i]['gejala']  ?> - <b class="text-success">Ya</b></li>
                                        <?php else : ?>
                                            <li class="list-group-item">Gejala tidak ditemukan di database</li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                <?php else : ?>
                                    Gejala atau keluhan tidak ditemukan
                                <?php endif; ?>
                                <?php foreach ($getFalseGejala as $falseGejala) : ?>
                                    <li class="list-group-item" id="tidak"><?= $falseGejala['gejala']  ?> - <b class="text-danger">Tidak</b></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?php endif; ?>

<!-- RESERVASI -->
<?php if ($this->session->userdata('id')) : ?>
    <!-- RESERVASI=============================== -->
    <section id="blog">
        <!-- <section id=" blog" style="padding:160px 0; background: gray;;"> -->
        <div class="container" id="reservasi">
            <div class=" textwidget">
                <h1 class="toptitle">RESERVASI SEKARANG DAN<br /> TENTUKAN JADWALNYA<br />
                    <!-- <i class=" fa fa-star roundicon" style="color: gold"></i> -->
                    <i class="material-icons-outlined roundicon" style="color: #fff; background-color : #F67219;"><i class="fas fa-calendar-day"></i></i>
                </h1>
                <div class="contactstyle topform">
                    <form action="<?= base_url(); ?>Landing_page/reservasi" method="post">
                        <div class="form">
                            <input type="text" name="name" placeholder="Atas Nama" required="required">
                            <div class="form-group">
                                <select class="form-control" id="perawatan" name="perawatan" required="required">
                                    <option selected="true" disabled="true">Treatment</option>
                                    <option value="Hair Spa">Hair Spa</option>
                                    <option value="Hair Mask">Hair Mask</option>
                                    <option value="Creambath">Creambath</option>
                                    <option value="Hair Cut">Hair Cut</option>
                                    <option value="Hair Coloring">Hair Coloring</option>
                                    <option value="Facial">Facial</option>
                                    <option value="Facial Galvanic">Facial Galvanic</option>
                                    <option value="Facial Orange">Facial Orange</option>
                                    <option value="Lulur">Lulur</option>
                                    <option value="Creambath">Sauna</option>
                                    <option value="Hair Cut">Mandi Rempah</option>
                                    <option value="Hair Coloring">Mandi Susu</option>

                                </select>
                            </div>
                            <label>Tanggal Reservasi</label>
                            <input type="date" name="tanggal" placeholder="Tanggal *">
                            <input type="text" name="email" value="<?= $this->session->userdata('email'); ?>">
                            <input type="text" name="phone" placeholder="Nomor Telepon *">
                            <button type="submit" id="submit" name="submit" class="btn btn-secondary btn-block">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- </section> -->
        <!-- <?php endif; ?> -->
        <!-- CONTACT
================================================== -->
        <section id="contact" class="nopadding" style="background-color:#F67219">
            <div class="whitetext" style="padding: 60px;">
                <div class="textwidget">
                    <div class="bookarea">
                        CUSTOMER SERVICES<br>
                        <span class="bordered">Villary Salon & Spa </span><br>
                        <span class="call">(349) 376-9275</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
        <!-- THE END OF SECTIONS -->
        </div>

        <!-- SCRIPTS
================================================== -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?= base_url(); ?>contact/bottomvalidate.js"></script>
        <script src="<?= base_url(); ?>contact/topvalidate.js"></script>
        <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jssaya.js"></script>
        <script>
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("tanggal")[0].setAttribute('min', today);
        </script>

        </body>

        </html>