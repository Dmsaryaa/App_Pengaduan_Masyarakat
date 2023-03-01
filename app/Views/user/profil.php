<?= $this->extend('layouts/admin') ?>
<!--=========================================================================================-->

<?= $this->Section('title') ?>
Edit Profil
<?= $this->endSection() ?>

<!--=========================================================================================-->

<?= $this->Section('content') ?>

<!-- Container ==============================================================================-->
<div class="container px-5 mt-4">

    <!-- Heading ===============================================-->

    <!--========================================================-->


    <!-- Body ==================================================-->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- Alert =================================================-->
            <?php if (!empty(session()->getFlashdata("message"))) : ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata("message") ?>
            </div>
            <?php endif ?>
            <!--========================================================-->
            <div class="card">
                <div class="card-header text-white" style="background: linear-gradient(to right, #3D088C, #05F7DF);">
                    <h3>Edit Profil</h3>
                    <!-- <a href="/fpetugas" class="btn btn-success">Tambah Data</a> -->
                </div>

                <form action="editprofil" id="" method="post">
                    <div class="card-body">
                        <?php
                        if (session('level') == 'masyarakat') {
                            $id = $user[0]["id_masyarakat"];
                            $nama = $user[0]["nama"];
                            $username = $user[0]["username"];
                            $telp = $user[0]["telp"];
                        } else {
                            $id = $user[0]["id_petugas"];
                            $nama = $user[0]["nama_petugas"];
                            $username = $user[0]["username"];
                            $telp = $user[0]["telp"];
                        }
                        ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" value="<?= $nama ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="<?= $username ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input type="number" name="telp" id="telp" value="<?= $telp ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Lama <span class="text-danger">Kosongkan jika tidak ingin
                                    diganti</span></label>
                            <input type="password" name="password_old" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru <span class="text-danger">Kosongkan jika tidak ingin
                                    diganti</span></label>
                            <input type="password" name="password_new" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer p-3" style="background: #3D088C;">

                        <button type="submit" class="btn" style="background: #00ADB5; color: white;"><i
                                class="fas fa-save"></i>&nbsp;&nbsp;Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--========================================================-->

    <br>



</div>
<!--=========================================================================================-->

<!-- Modal ==================================================================================-->

<!--=========================================================================================-->

<?= $this->endSection() ?>


<!--=========================================================================================-->

<?= $this->Section('script') ?>


<?= $this->endSection() ?>

<!--=========================================================================================-->