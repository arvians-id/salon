<div class="container-fluid">
  <!-- riwayat -->
  <div class="row">
  </div>
  <!-- <div class="col-lg-9"> -->
  <div class="section-body mt-3">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Data Riwayat
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="myTable">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Kode Riwayat</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Perawatan</th>
                    <th>Tanggal Keluhan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;

                  foreach ($getRiwayat as $riwayat) : ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $riwayat['kode_riwayat'] ?></td>
                      <td><?= $riwayat['nama_pelanggan'] ?></td>
                      <td><?= $riwayat['kode_jenis_perawatan'] ?></td>
                      <td><?= $riwayat['created_at'] ?></td>
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
<!-- end of riwayat -->

<!-- list akun pelanggan -->

<!-- end of list akun pelanggan -->
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


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