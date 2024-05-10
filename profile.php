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
                    <h1>Profile</h1>
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
                            <h3 class="card-title">Profile Dokter</h3>

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
                            <div class="container">
                                <h4 class="text-center mt-4">Selamat Datang Di Website Puskesmas Rhodes</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center"> <img
                                                        class="profile-user-img img-fluid img-circle"
                                                        src="dist/img/dokter.png" alt="User profile picture"> </div>
                                                <h3 class="profile-username text-center">IS</h3>
                                                <p class="text-muted text-center">Dokter Spesialis</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item"> <b> Jenis-Kelamin</b> <a
                                                            class="float-right">Laki-laki</a> </li>
                                                    <li class="list-group-item"> <b> Nomer Induk Dokter</b> <a
                                                            class="float-right">0110120102</a> </li>
                                                    <li class="list-group-item"> <b> Telepon</b> <a
                                                            class="float-right">0812345678910</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">About Me</h3>
                                            </div> <!-- /.card-header -->
                                            <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>
                                                    Lulusan</strong>
                                                <p class="text-muted"> Universitas Indonesia </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                                                <p class="text-muted">Jakarta</p>
                                                <hr>
                                                </p>
                                                <hr>
                                                <strong><i class="far fa-file-alt mr-1"></i> Catatan</strong>
                                                <p class="text-muted">Hubungi saat penting</p>
                                            </div> <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Profil Dokter Puskesmas
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