<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data periksa berdasarkan id
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_tanggal = $_POST['tanggal'];
    $_berat = $_POST['berat'];
    $_tinggi = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_pasien_id = $_POST['pasien_id'];
    $_paramedik_id = $_POST['paramedik_id'];
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_paramedik_id, $id];
    // Query SQL untuk update data periksa berdasarkan id
    $sql = "UPDATE periksa SET tanggal = ?, berat = ?, tinggi = ?, tensi = ?, keterangan = ?, pasien_id = ?, paramedik_id = ? WHERE id = ?";
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
                    <h1>Edit data Periksa</h1>
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
                            <h3 class="card-title">Form Periksa</h3>

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
                            <h2 class="text-center">Form Periksa</h2>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="id" class="col-4 col-form-label">id</label>
                                    <div class="col-8">
                                        <input id="id" name="id" type="int(11)" class="form-control"
                                            value="<?= $row['id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
                                    <div class="col-8">
                                        <input id="tanggal" name="tanggal" type="date" class="form-control"
                                            value="<?= $row['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berat" class="col-4 col-form-label">berat</label>
                                    <div class="col-8">
                                        <input id="berat" name="berat" type="double" class="form-control"
                                            value="<?= $row['berat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinggi" class="col-4 col-form-label">tinggi</label>
                                    <div class="col-8">
                                        <input id="tinggi" name="tinggi" type="double" class="form-control"
                                            value="<?= $row['tinggi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tensi" class="col-4 col-form-label">tensi</label>
                                    <div class="col-8">
                                        <input id="tensi" name="tensi" type="varchar(20)" class="form-control"
                                            value="<?= $row['tensi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-8">
                                        <?php if (isset($row['keterangan'])): ?>
                                            <textarea id="keterangan" name="keterangan" class="form-control"
                                                rows="3"><?= htmlspecialchars($row['keterangan'], ENT_QUOTES, 'UTF-8') ?></textarea>
                                        <?php else: ?>
                                            <textarea id="keterangan" name="keterangan" class="form-control"
                                                rows="3"></textarea>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_id" class="col-4 col-form-label">Pasien id</label>
                                    <div class="col-8">
                                        <select id="pasien_id" name="pasien_id" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM pasien";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['pasien_id'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_id" class="col-4 col-form-label">paramedik id</label>
                                    <div class="col-8">
                                        <select id="paramedik_id" name="paramedik_id" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM paramedik";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['paramedik_id'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
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