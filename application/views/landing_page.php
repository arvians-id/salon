<!-- ABOUT
================================================== -->
<section id="tentang" class="whitetext" style="padding:160px 0;background-color:#F67219;">
	<div class="container">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

		<div class="so-widget-sow-headline">
			<div class="sow-headline">
				<!-- <h1 class="whitetext">SELAMAT DATANG</h1> -->
				<h1 class="whitetext">Vilary Salon & Spa</h1>
			</div>
		</div>
		<br />
		<div class="w960 text-center">
			<p>
				Merupakan tempat perawatan kecantikan tubuh, dikelola oleh staff yang berpengalaman di bidang kecantikan
				Vilary Salon & Spa bisa menjadi pilihan yang tepat untuk perawatan tubuh.
			</p>
		</div>

	</div>
</section>


<!-- SERVICES
================================================== -->
<section id="services" class="services margintop60" style="margin-bottom: 50px;">
	<div class="container">
		<div class="sow-headline">
			<h1>SPA MENU</h1>
			<div class="decoration">
				<div class="decoration-inside">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h3>01. Body Treatment</h3>
				Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.
				<h3>02. Face Treatment</h3>
				Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.
				<h3>03. Hair Treatment</h3>
				Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.
			</div>
			<div class="col-md-6">
				<h3>04. Make Up</h3>
				Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.
				<h3>05. Time Management</h3>
				Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.
				<h3>06. One-to-one Business</h3>
				Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.
			</div>
		</div>
	</div>
</section>

<!-- Lamun aya user nu login tampilken form lamun hnteu nya engges we eweh -->
<?php if ($this->session->userdata('id')) : ?>
	<!-- KELUHAN PELANGGAN=============================== -->
	<section id="keluhan" class="whitetext" style="padding:160px 0;background-color:#fff;">
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
					<div class="card-header">
						<h4>Form Keluhan/Pengaduan Pelanggan</h4>
					</div>
					<div class="card-body">
						<form method="post" class="f1">
							<div class="f1-steps text-center">
								<div class="f1-progress">
									<div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
								</div>
								<div class="f1-step active">
									<div class="f1-step-icon text-center"><i class="fas fa-wifi"></i></div>
									<p>Jenis Perawatan</p>
								</div>
								<div class="f1-step">
									<div class="f1-step-icon text-center"><i class="fas fa-question"></i></div>
									<p>Keluhan</p>
								</div>
								<div class="f1-step">
									<div class="f1-step-icon text-center"><i class="fas fa-key"></i></div>
									<p>Penyesuaian</p>
								</div>
							</div>
							<!-- step 1 -->
							<fieldset>
								<h4>Data Perawatan</h4>
								<div class="form-group">
									<select name="kode_modem" class="form-control" id="verifikasiModem" required>
										<option value="" selected disabled>Pilih...</option>
										<option value="SPA">SPA</option>
										<option value="Rambut">Rambut</option>
									</select>
								</div>
								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
									<button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
								</div>
							</fieldset>
							<!-- step 3 -->
							<fieldset>
								<h4>Keluhan Pelanggan</h4>
								<p class="text-danger text-center">*Note: Jika tidak diisi akan otomatis terjawab <b>Tidak</b></p>
								<div class="f1-buttons">
									<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
									<button type="button" id="from-gejala" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
								</div>
							</fieldset>
							<!-- step 4 -->
							<fieldset>
								<h4>Penyesuaian Keluhan</h4>
								<div class="empty-state">
									<div class="empty-state-icon">
										<i class="fas fa-key"></i>
									</div>
									<h2 id="kode-pelanggan">Kode Pelanggan - Nama Pelanggan</h2>
									<div class="profile-widget-description">
										<div class="profile-widget-name" id="kode-modem">kode modem
											<div class="text-muted d-inline font-weight-normal">
												<div class="slash"></div> modem
											</div>
										</div>
										<p class="font-weight-bold mt-2">Keluhan Anda</p>
										<table class="table table-responsive mt-3">
											<thead id="penyesuaian-keluhan">
												<tr>
													<th>Kode</th>
													<td>Gejala/Keluhan</td>
												</tr>
											</thead>
										</table>
									</div>
									<div class="f1-buttons">
										<button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Kembali</button>
										<button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Selesai</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!-- RESERVASI=============================== -->
	<section id="blog" style="padding:160px 0;background-image: url(assets/img/spa/bg.jpg); background-position: center; background-repeat: no-repeat;background-size: cover;background-attachment:fixed;">
		<div class="container">
			<div class="textwidget">
				<h1 class="toptitle">RESERVASI SEKARANG DAN<br /> TENTUKAN JADWALNYA <br /><br />
					<!-- <i class="fa fa-star roundicon" style="color: gold"></i> -->
					<i class="material-icons-outlined roundicon" style="color: #fff; background-color : #F67219;"><i class="fas fa-calendar-day"></i></i>
				</h1>
				<div class="contactstyle topform">

					<form action="<?= base_url(); ?>Landing_page/index" method="post">
						<div class="form">
							<input type="text" name="name" placeholder="Atas Nama" required="required">
							<div class="form-group">
								<select class="form-control" id="perawatan" name="perawatan" required="required">
									<option value=" Creambath">Creambath</option>
									<option value="Rebonding">Rebonding</option>
									<option value="Potong Rambut">Potong Rambut</option>
								</select>
							</div>
							<input type="date" name="tanggal" placeholder="Tanggal *">
							<input type="text" name="email" value="<?= $this->session->userdata('email'); ?>">
							<input type="text" name="phone" placeholder="Nomor Telepon *">
							<button type="submit" id="submit" name="submit" class="btn btn-secondary btn-block">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

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