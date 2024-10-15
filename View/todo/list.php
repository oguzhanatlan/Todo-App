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
                                <h3 class="card-title">Todo</h3>

                                <div class="card-tools">
                                    <a href="<?php echo url('todo/add') ?>" class="btn btn-m btn-dark">Ekle</a>
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
                                        <th>Kategori</th>
                                        <th>Başlangıç Tarihi</th>
                                        <th>Bitiş Tarihi</th>
                                        <th>İlerleme</th>
                                        <th>İşlem</th>
                                        <th style="width: 40px;">İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value): ?>
                                        <tr id="row_<?= $value['id'] ?>">
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><?php echo $value['category_title'] ?></td>
                                            <td><?php echo $value['start_date'] ?></td>
                                            <td><?php echo $value['end_date'] ?></td>
                                            <td>
                                                <?php echo $value['progress'] ?>%
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo $value['progress'] ?>%; background-color: <?php echo $value['color'] ?>"></div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-<?= $value['status'] == 'a' ? 'success' : 'danger'  ?>"><?= $value['status'] == 'a' ? 'Devam Ediyor' : 'Bitti'  ?></span></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?php echo url('todo/edit/' . $value['id']) ?>" class="btn btn-sm btn-primary mr-2">Güncelle</a>
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeTodo(<?= $value['id'] ?>)">Sil</button>
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
<script src="<?php echo assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    function removeTodo(id){
        let formData = new FormData();
        formData.append('id', id)

        axios.post('<?php echo url("api/removetodo"); ?>', formData).then(res => {

            if (res.data.id){
                let row = document.getElementById('row_'+res.data.id);
                row.remove();
            }

            swal.fire(
                res.data.title,
                res.data.msg,
                res.data.status
            );

        }).catch(err => console.log(err));
    }

</script>
</body>
</html>