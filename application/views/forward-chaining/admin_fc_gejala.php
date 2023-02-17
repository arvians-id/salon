<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            Menu Pengolahan Data Forward Chaining
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="<?= base_url() ?>forward_chaining/data_riwayat" class="list-group-item list-group-item-action <?= $this->uri->segment(2) == 'data_riwayat' ? 'active' : '' ?>">Data Riwayat</a>
                        <a href="<?= base_url() ?>forward_chaining/data_jenis_perawatan" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_jenis_perawatan', 'ubah_jenis_perawatan']) ? 'active' : '' ?>">Data Jenis Perawatan</a>
                        <a href="<?= base_url() ?>forward_chaining/data_gejala" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_gejala', 'ubah_gejala']) ? 'active' : '' ?>">Data Gejala</a>
                        <a href="<?= base_url() ?>forward_chaining/data_solusi" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_solusi', 'ubah_solusi']) ? 'active' : '' ?>">Data Solusi</a>
                        <a href="<?= base_url() ?>forward_chaining/data_rules" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_rules', 'ubah_rules']) ? 'active' : '' ?>">Data Rules</a>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="section-body">
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php elseif ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-header">
                                Input Gejala
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Kode Gejala</label><small class="text-danger"> *</small>
                                        <input type="text" name="kode_gejala" class="form-control <?= form_error('kode_gejala') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_gejala') ?>">
                                        <div class="invalid-feedback"><?= form_error('kode_gejala') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Perawatan</label><small class="text-danger"> *</small>
                                        <select name="kode_jenis_perawatan" class="form-control <?= form_error('kode_jenis_perawatan') ? 'is-invalid' : '' ?>">
                                            <option value="" selected disabled>Pilih Jenis Perawatan ...</option>
                                            <?php foreach ($getJenisPerawatan as $jenisPerawatan) : ?>
                                                <option value="<?= $jenisPerawatan['kode_jenis_perawatan'] ?>" <?= set_value('kode_jenis_perawatan') == $jenisPerawatan['kode_jenis_perawatan'] ? 'selected' : '' ?>><?= $jenisPerawatan['kode_jenis_perawatan'] ?> - <?= $jenisPerawatan['nama_jenis_perawatan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kode_jenis_perawatan') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Gejala</label><small class="text-danger"> *</small>
                                        <input type="text" name="gejala" class="form-control <?= form_error('gejala') ? 'is-invalid' : '' ?>" value="<?= set_value('gejala') ?>">
                                        <div class="invalid-feedback"><?= form_error('gejala') ?></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="section-body mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        Data Gejala
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Kode Gejala</th>
                                                        <th>Nama Jensi Perawatan</th>
                                                        <th>Nama Gejala</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($getGejala as $gejala) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td>
                                                                <?= $gejala['kode_gejala'] ?>
                                                                <br>
                                                                <a href="<?= base_url('forward_chaining/ubah_gejala/' . $gejala['kode_gejala']) ?>">Ubah</a> |
                                                                <a href="<?= base_url('forward_chaining/hapus_gejala/' . $gejala['kode_gejala']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
                                                            </td>
                                                            <td><?= $gejala['nama_jenis_perawatan'] ?></td>
                                                            <td><?= $gejala['gejala'] ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>

</html>