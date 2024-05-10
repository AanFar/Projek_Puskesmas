<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pasien</h1>
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
                            <h3 class="card-title">Table Pasien</h3>

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
                            <h2 class="text-center">Data Pasien</h2>
                            <a href="add.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tanggal</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Tensi darah</th>
                                        <th>Keterangan</th>
                                        <th>Pasien id</th>
                                        <th>Dokter id</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Panggil file
                                    require '../dbkoneksi.php';
                                    // Bikin Query SQL
                                    $query = $dbh->query("SELECT * FROM periksa");
                                    // Tampilkan data looping
                                    foreach ($query as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['tanggal'] . "</td>";
                                        echo "<td>" . $row['berat'] . "</td>";
                                        echo "<td>" . $row['tinggi'] . "</td>";
                                        echo "<td>" . $row['tensi'] . "</td>";
                                        echo "<td>" . $row['keterangan'] . "</td>";
                                        echo "<td>" . $row['pasien_id'] . "</td>";
                                        echo "<td>" . $row['paramedik_id'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='edit.php?id=" . $row['id'] . "'><button class='btn btn-warning'>Edit</button></a>";
                                        echo "<span class='mx-1'></span>"; 
                                        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin Hapus Data?\")'><button class='btn btn-danger'>Delete</button></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Data Periksa
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