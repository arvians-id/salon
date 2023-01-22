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
                        <a href="<?= base_url() ?>forward_chaining/data_gejala" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_gejala', 'ubah_gejala']) ? 'active' : '' ?>">Data Gejala</a>
                        <a href="<?= base_url() ?>forward_chaining/data_solusi" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_solusi', 'ubah_solusi']) ? 'active' : '' ?>">Data Solusi</a>
                        <a href="<?= base_url() ?>forward_chaining/data_rules" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_rules', 'ubah_rules']) ? 'active' : '' ?>">Data Rules</a>
                        <a href="<?= base_url() ?>forward_chaining/data_jenis_perawatan" class="list-group-item list-group-item-action <?= in_array($this->uri->segment(2), ['data_jenis_perawatan', 'ubah_jenis_perawatan']) ? 'active' : '' ?>">Data Jenis Perawatan</a>
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
                                Input Jenis Perawatan
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Kode Jenis Perawatan</label><small class="text-danger"> *</small>
                                        <input type="text" name="kode_jenis_perawatan" class="form-control <?= form_error('kode_jenis_perawatan') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_jenis_perawatan') ?>">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Jenis Perawatan</label><small class="text-danger"> *</small>
                                        <input type="text" name="nama_jenis_perawatan" class="form-control <?= form_error('nama_jenis_perawatan') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_jenis_perawatan') ?>">
                                        <div class="invalid-feedback"></div>
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
                                        Data Jenis Perawatan
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Kode Jenis Perawatan</th>
                                                        <th>Nama Jenis Perawatan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($getJenisPerawatan as $jenis_perawatan) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td>
                                                                <?= $jenis_perawatan['kode_jenis_perawatan'] ?>
                                                                <br>
                                                                <a href="<?= base_url('forward_chaining/ubah_jenis_perawatan/' . $jenis_perawatan['kode_jenis_perawatan']) ?>">Ubah</a> |
                                                                <a href="<?= base_url('forward_chaining/hapus_jenis_perawatan/' . $jenis_perawatan['kode_jenis_perawatan']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
                                                            </td>
                                                            <td><?= $jenis_perawatan['nama_jenis_perawatan'] ?></td>
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