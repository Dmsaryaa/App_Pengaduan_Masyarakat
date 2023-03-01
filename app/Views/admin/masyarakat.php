<?= $this->extend('layouts/admin') ?>
<!--=========================================================================================-->

<?= $this->Section('title') ?>
Data Petugas
<?= $this->endSection() ?>

<!--=========================================================================================-->

<?= $this->Section('content') ?>

<!-- Container ==============================================================================-->
<div class="container px-5 mt-4">

    <!-- Heading ===============================================-->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Masyarakat</h1>
        <nav class="mt-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Masyarakat</li>
            </ol>
        </nav>


    </div>
    <!--========================================================-->


    <!-- Body ==================================================-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background: linear-gradient(to right, #3D088C, #05F7DF);">
                    <h1 class="text-white mx-3 mt-2 mb-3">Masyarakat
                        &nbsp;
                        <a href="" data-toggle="modal" data-target="#fMasyarakat" data-masyarakat="add"
                            class="btn text-white" style="background: #00ADB5;">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    </h1>
                    <!-- <a href="/fMasyarakat" class="btn btn-success">Tambah Data</a> -->
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr class="text-center">
                            <th class="col-lg-1">No</th>
                            <th class="col-lg-3">Nik</th>
                            <th class="col-lg-2">Nama</th>
                            <th class="col-lg-2">Username</th>
                            <th class="col-lg-2">Telp</th>
                            <th class="col-lg-2">Aksi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($masyarakat as $row) {
                            $data = $row['id_masyarakat'] . "," . $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                            # code...
                            $no++;
                        ?>
                        <tr class="text-center">
                            <td><?= $no ?></td>
                            <td><?= $row['nik'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['telp'] ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#fMasyarakat"
                                    class="btn btn-warning text-white" data-masyarakat="<?= $data ?>"><i
                                        class="fas fa-edit"></i></a>
                                <a href="/masyarakat/hapus/<?= $row['id_masyarakat'] ?>"
                                    onclick="return confirm('Yakin ingin hapus data ?')" class="btn btn-danger"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--========================================================-->

    <br>

    <!-- Alert =================================================-->
    <?php if (!empty(session()->getFlashdata("message"))) : ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata("message") ?>
    </div>
    <?php endif ?>
    <!--========================================================-->

</div>
<!--=========================================================================================-->

<!-- Modal ==================================================================================-->
<div class="modal fade" id="fMasyarakat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header ================================================-->
            <div class="modal-header" style="background: #3D088C;">
                <h3 class="modal-title text-white " id="exampleModalLabel">Form Masyarakat</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--========================================================-->

            <!-- Form ==================================================-->
            <form action="" id="editMasyarakat" method="post">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama"> Nama</label>
                        <input type="text" name="nama" id="nama" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="pass" value="" class="form-control">
                    </div>
                    <div class="form-check mb-3" id="ubahpassword">
                        <input type="checkbox" class="form-check-input" name="ubahpassword"
                            aria-label="Mau Ubah Password">
                        <label class="form-check-label" for="ubahpassword">Ubah Password</label>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" value="" class="form-control">
                    </div>
                </div>

                <div class="modal-footer" style="background: #3D088C;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background: #00ADB5; color: white;"><i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
            </form>
            <!--========================================================-->

        </div>
    </div>
</div>
<!--=========================================================================================-->

<?= $this->endSection() ?>

<!--=========================================================================================-->

<?= $this->Section('script') ?>
<script>
$(document).ready(function() {
    $("#fMasyarakat").on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var data = button.data('masyarakat');
        // alert("asa");

        if (data != "add") {

            const barisdata = data.split(",");
            // alert(barisdata[4]);
            $("#nik").val(barisdata[1]);
            $("#nama").val(barisdata[2]);
            $("#username").val(barisdata[3]);
            $("#password").val(barisdata[4]);
            $("#telp").val(barisdata[5]);
            $("#editMasyarakat").attr('action', barisdata[6]);
            // alert(barisdata[6]);
            $("#ubahpassword").show();
        } else {
            $("#nik").val("");
            $("#nama").val("");
            $("#username").val("");
            $("#telp").val("");
            $("#editMasyarakat").attr('action', "savemasy");
            $("#ubahpassword").hide();
        }
    });
})
</script>
<?= $this->endSection() ?>

<!--=========================================================================================-->