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
                        <div class="card">
                            <div class="card-header">
                                Input Rules
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Kode Rules</label><small class="text-danger"> *</small>
                                        <input type="text" name="kode_rules" class="form-control <?= form_error('kode_rules') ? 'is-invalid' : '' ?>" value="<?= set_value('kode_rules') ?>">
                                        <div class="invalid-feedback"><?= form_error('kode_rules') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Solusi</label><small class="text-danger"> *</small>
                                        <select name="kode_solusi_rules" class="form-control <?= form_error('kode_solusi_rules') ? 'is-invalid' : '' ?>">
                                            <option value="" selected disabled>Pilih Solusi ...</option>
                                            <?php foreach ($getSolusi as $solusi) : ?>
                                                <option value="<?= $solusi['kode_solusi'] ?>" <?= set_value('kode_solusi_rules') == $solusi['kode_solusi'] ? 'selected' : '' ?>><?= $solusi['kode_solusi'] ?> - <?= $solusi['solusi'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div class="invalid-feedback"><?= form_error('kode_solusi_rules') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Gejala</label><small class="text-danger"> *</small>
                                        <select name="kode_gejala_rules[]" class="form-control <?= form_error('kode_gejala_rules') ? 'is-invalid' : '' ?>" multiple>
                                            <?php foreach ($getGejala as $gejala) : ?>
                                                <option value="<?= $gejala['kode_gejala'] ?>"><?= $gejala['kode_gejala'] ?> - <?= $gejala['gejala'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div><?= form_error('kode_gejala_rules') ?></div>
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
                                        Data Rules
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Kode Rules</th>
                                                        <th>Kode Solusi</th>
                                                        <th>Kode Gejala</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($getRules as $rules) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no++ ?></td>
                                                            <td>
                                                                <?= $rules['kode_rules'] ?>
                                                                <br>
                                                                <a href="<?= base_url('forward_chaining/ubah_rules/' . $rules['kode_rules']) ?>">Ubah</a> |
                                                                <a href="<?= base_url('forward_chaining/hapus_rules/' . $rules['kode_rules']) ?>" onclick="return confirm('Yakin ingin menghapusnya?')">Hapus</a>
                                                            </td>
                                                            <td><?= $rules['kode_solusi_rules'] ?></td>
                                                            <td><?= $rules['kode_gejala_rules'] ?></td>
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