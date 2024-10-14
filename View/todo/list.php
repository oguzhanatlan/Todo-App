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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Kategoriler</h3>

                                <div class="card-tools">
                                    <a href="<?php echo url('categories/add') ?>" class="btn btn-m btn-dark">Ekle</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">

                                <?php
                                    echo get('message') != false ? '<div class="alert alert-'.get('type').'">'.get('message').'</div>' : null;
                                ?>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Başlık</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Güncelleme Tarihi</th>
                                        <th style="width: 40px">İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><?php echo $value['updated_date'] ?></td>
                                            <td><?php echo $value['created_date'] ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?php echo url('categories/edit/' . $value['id']) ?>" class="btn btn-sm btn-primary mr-2">Güncelle</a>
                                                    <a href="<?php echo url('categories/remove/' . $value['id']) ?>" class="btn btn-sm btn-danger">Sil</a>
                                                </div>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

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