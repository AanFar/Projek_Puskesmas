<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data kelurahan berdasarkan id
    $sql = "SELECT * FROM kelurahan WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_id = $_POST['id'];
    $_nama = $_POST['nama'];
    $_kec_id = $_POST['kec_id'];
    // Data untuk diikat dalam query
    $data = [$_id, $_nama, $_kec_id, $id];
    // Query SQL untuk update data kelurahan berdasarkan id
    $sql = "UPDATE kelurahan SET id = ?, nama = ?, kec_id = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Pasien</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Form Pasien</h2>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="id" class="col-4 col-form-label">Id</label>
                                    <div class="col-8">
                                        <input id="id" name="id" type="text" class="form-control"
                                            value="<?= $row['id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control"
                                            value="<?= $row['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kec_id" class="col-4 col-form-label">kecamatan</label>
                                    <div class="col-8">
                                        <?php if (isset($row['kec_id'])): ?>
                                            <input id="kec_id" name="kec_id" type="text" class="form-control"
                                                value="<?= $row['kec_id'] ?>">
                                        <?php else: ?>
                                            <input id="kec_id" name="kec_id" type="text" class="form-control" value="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Perubahan Data Pasien
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>