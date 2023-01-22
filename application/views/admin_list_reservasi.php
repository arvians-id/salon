<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            List Reservasi
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Perawatan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($reservasi as $r) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $r['name']; ?></td>
                                <td><?= $r['perawatan']; ?></td>
                                <td><?= $r['tanggal']; ?></td>
                                <td><?= $r['email']; ?></td>
                                <td><?= $r['phone']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin_dashboard/hapusreservasi/' . $r['id']); ?>" class="badge badge-danger"> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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