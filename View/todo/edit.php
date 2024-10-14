<?php view('static/header'); ?>
<div class="wrapper">


    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo URL.'cikis' ?>" class="nav-link">Çıkış Yap</a>
            </li>
        </ul>
    </nav>

    <?php view('static/sidebar') ?>
    <div class="content-wrapper p-4">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">


                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Kategori Ekle</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?php
                                    echo get_session('error') != false ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null;
                                ?>
                                <form action="" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Kategori Başlığı</label>
                                            <input type="text" class="form-control" value="<?php echo $data['title']?>" name="title" id="title" placeholder="Kategori başlığı giriniz">
                                            <input type="hidden" value="<?php echo $data['id']?>" name="id">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="submit" value="1" class="btn btn-primary">Güncelle</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->



                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <?php view('static/footer'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo assets('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets('js/adminlte.min.js')?>"></script>
</body>
</html>