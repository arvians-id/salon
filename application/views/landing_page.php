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

<!-- session forward chaining -->
<?php if ($this->session->userdata('id')) : ?>
	<!-- KELUHAN PELANGGAN=============================== -->
	<section id="keluhan" class="whitetext" style="padding:160px 0;background-image: url(assets/img/spa/bg.jpg); background-position: center; background-repeat: no-repeat;background-size: cover;background-attachment:fixed;">
		<section id="keluhan" class="services margintop60 container">
			<div class="sow-headline">
				<h1 class="toptitle" style="color:white;">TENTUKAN JENIS PERAWATAN YANG TEPAT UNTUK ANDA</h1>
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
				<div class="card" style="padding:100px 10px;background:#fff;">
					<div class="card-header">
					</div>
					<div class="card-body">
						<form method="post" class="f1">
							<div class="f1-steps text-center">
								<div class="f1-progress">
									<div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
								</div>
								<div class="f1-step active">
									<div class="f1-step-icon text-center"><i class="fas fa-spa"></i></div>
									<p>Jenis Perawatan</p>
								</div>
								<div class="f1-step">
									<div class="f1-step-icon text-center"><i class="fas fa-question"></i></div>
									<p>Keluhan</p>
								</div>
								<div class="f1-step">
									<div class="f1-step-icon text-center"><i class="fas fa-clipboard-list"></i></div>
									<p>Penyesuaian</p>
								</div>
							</div>
							<!-- step 1 -->
							<fieldset>
								<h4>Data Perawatan</h4>
								<div class="form-group">
									<select name="kode_jenis_perawatan" class="form-control" id="getGejalaBasedOnPerawatan" required>
										<option value="" selected disabled>Pilih...</option>
										<?php foreach ($jenis_perawatan as $jp) : ?>
											<option value="<?= $jp['kode_jenis_perawatan'] ?>"><?= $jp['nama_jenis_perawatan'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="f1-buttons">
									<button type="button" class="cf7mls_next btn btn-primary btn-next" disabled>Selanjutnya <i class="fa fa-arrow-right"></i></button>
								</div>
							</fieldset>
							<!-- step 3 -->
							<fieldset>
								<h4>Keluhan Pelanggan</h4>
								<p class="text-danger text-center">*Note: Jika tidak diisi akan otomatis terjawab <b>Tidak</b></p>
								<div id="data-gejala"></div>
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
									<div class="profile-widget-description">
										<h4 class="font-weight-bold mt-2 text-center" style="color: black;">Keluhan Anda</h4>
										<table class="table table-bordered" style="text-align: left;">
											<thead id="penyesuaian-keluhan" style="color: black;"></thead>
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
	<section id="reservasi">
		<div class="container">
			<div class="sow-headline" style="margin: 50px;">
				<h1>RESERVASI SEKARANG DAN<br /> TENTUKAN JADWALNYA <br /></h1>
				<div class="decoration">
					<div class="decoration-inside">
					</div>
				</div>
			</div>
			<div class="textwidget">
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
	$(function() {
		$('#getGejalaBasedOnPerawatan').on('change', function() {
			let kode_jenis_perawatan = $('select[name="kode_jenis_perawatan"] option').filter(':selected').val()
			$.ajax({
				type: 'GET',
				url: '<?= base_url() ?>/landing_page/getGejala/' + kode_jenis_perawatan,
				dataType: "json",
				success: function(data) {
					let html = ''
					let no = 0
					$.each(data, function(key, value) {
						html += `
								<div class="form-group text-center">
									<h4 class="text-center" style="margin-bottom: 0px; color: black;">${value['gejala']}</h4>
									<div class="form-check form-check-inline d-inline">
										<input class="form-check-input" type="radio" name="jawaban[${no}]" id="${value['kode_gejala']}1" value="${value['kode_gejala']}" data-fullgejala="${value['kode_gejala'] + "," + value['gejala']}">
										<label class="form-check-label" style="color: black" for="${value['kode_gejala']}1">Ya</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="jawaban[${no}]" id="${value['kode_gejala']}2" value="undefined" data-fullgejala="">
										<label class="form-check-label" style="color: black" for="${value['kode_gejala']}2">Tidak</label>
									</div>
								</div>`;
						no++
					});

					$('#data-gejala').html(html)
				},
			})
		})


		$('#from-gejala').on('click', function() {
			let arr = [];
			$(".form-check-input:checked").each(function() {
				if ($(this).data('fullgejala') != "") {
					arr.push($(this).data('fullgejala'));
				}
			});
			let str = ""
			for (let i = 0; i < arr.length; i++) {
				let splitGejala = arr[i].split(",")
				str += `<tr>
							
							<td>${splitGejala[1]}</td>
						</tr>`
			}
			if (str == "") {
				str = "Anda tidak mengeluhkan apapun disini! Silahkan kembali lagi. Setidaknya terdapat 1 keluhan yang anda keluhkan."
				$('.btn-submit').hide()
			} else {
				$('.btn-submit').show()
			}
			$('#penyesuaian-keluhan').html(str)
		})
	})

	jQuery($ => {
		let $btn = $('.cf7mls_next');

		$('select').on('change', e => {
			$btn.prop('disabled', e.target.value == '');
		});
	});
</script>

</body>

</html>