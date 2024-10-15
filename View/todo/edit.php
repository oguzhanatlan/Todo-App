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
                                <h3 class="card-title">Yapılacaklar Listenize Ekleyiz</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php

                            echo get_session('error') != false ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null;
                            ?>
                            <form id="todo" action="" method="post">
                                <input type="hidden" id="id" name="id" value="<?= $data['id'] ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Başlık</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Ne yapmak istersiniz?" value="<?= $data['title'] ?>">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Kategori</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Kategori Seçimi Yapın</option>
                                            <?php foreach ($data['categories'] as $category): ?>
                                                <option <?= $data['category_id'] == $category['id'] ? 'selected=""' : NULL ?> value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description">Açıklama</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Ne yapmak istersiniz?" value="<?= $data['description'] ?>">
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="status">Durum</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="a" <?= $data['status'] == 'a' ? 'selected' : NULL; ?>>Aktif</option>
                                            <option value="p" <?= $data['status'] == 'p' ? 'selected' : NULL; ?>>Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="progress">İlerleme</label>
                                        <input type="range" class="form-control" name="color" id="progress" value="<?= $data['progress'] ?>" min="0" max="100">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="color">Renk</label>
                                        <input type="color" class="form-control" name="color" id="color" value="<?= $data['color'] ?>"">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="start_date">Başlangıç Tarihi</label>
                                        <div class="row">

                                            <?php
                                               $start_date = date('Y-m-d', strtotime($data['start_date']));
                                               $start_date_time = date('H:i', strtotime($data['start_date']));
                                               $end_date = date('Y-m-d', strtotime($data['end_date']));
                                               $end_date_time = date('H:i', strtotime($data['end_date']));
                                            ?>

                                            <input type="date" value="<?php echo $start_date ?>" class="form-control col-8" name="start_date" id="start_date">
                                            <input type="time" value="<?php echo $start_date_time ?>" class="form-control col-4" name="start_date_time" id="start_date_time">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="end_date">Bitiş Tarihi</label>
                                        <div class="row">
                                            <input type="date" value="<?php echo $end_date ?>" class="form-control col-8" name="end_date" id="end_date">
                                            <input type="time" value="<?php echo $end_date_time ?>" class="form-control col-4" name="end_date_time" id="end_date_time">
                                        </div>
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
<script src="<?php echo assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    const todo = document.getElementById('todo');

    todo.addEventListener('submit', (e) => {
        e.preventDefault();

        let id = document.getElementById('id').value;
        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let category_id = document.getElementById('category_id').value;
        let color = document.getElementById('color').value;
        let status = document.getElementById('status').value;
        let progress = document.getElementById('progress').value;
        let start_date = document.getElementById('start_date').value;
        let end_date = document.getElementById('end_date').value;
        let start_date_time = document.getElementById('start_date_time').value;
        let end_date_time = document.getElementById('end_date_time').value;

        let formData = new FormData();

        formData.append('id', id)
        formData.append('title', title)
        formData.append('description', description)
        formData.append('category_id', category_id)
        formData.append('color', color)
        formData.append('status', status)
        formData.append('progress', progress)
        formData.append('start_date', start_date)
        formData.append('end_date', end_date)
        formData.append('start_date_time', start_date_time)
        formData.append('end_date_time', end_date_time)

        axios.post('<?php echo url("api/edittodo"); ?>', formData).then(res => {

            swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status
            ).then((result) => {
                // Kullanıcı "tamam" butonuna bastığında yönlendirme yap
                if (result.isConfirmed && res.data.redirect) {
                    window.location.href = res.data.redirect;
                }
            });

        }).catch(err => console.log(err));
    });

</script>

</body>
</html>
