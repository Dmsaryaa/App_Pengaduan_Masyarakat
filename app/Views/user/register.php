<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(#3D088C, #05F7DF);">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 100px;">
                    <div class="card-body p-0">

                        <!-- Alert ===============================================-->
                        <?php
                        if (!empty(session()->getFlashdata())) :
                        ?>

                        <div class="alert alert-success">
                            <?= session()->getFlashdata("error") ?>
                        </div>

                        <?php endif ?>
                        <!--=====================================================-->


                        <div class="row">

                            <div class="p-5 ">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>

                                <form class="user px-3" method="post" action="saveregister">

                                    <div class="form-group row">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="nik" name="nik"
                                            placeholder="Masukkan NIK" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                            placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username"
                                            name="username" placeholder="Masukkan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="telp"
                                            name="telp" placeholder="Masukkan No.Telpon">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password2"
                                                class="form-control form-control-user" id="password"
                                                placeholder="Ulangi Password" required>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-user btn-block fw-bold fs-6"
                                        style="background: linear-gradient(to left, #05F7DF, #3D088C, #3D088C, #3D088C, #05F7DF);">
                                        Register Account
                                    </button>

                                </form>
                                <br>
                                <hr>
                                <div class="text-center">
                                    Sudah memiliki akun?<a class="small" href="/login"> Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

</body>

</html>