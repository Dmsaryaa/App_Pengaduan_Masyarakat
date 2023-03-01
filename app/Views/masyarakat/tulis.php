<?= $this->extend('layouts/admin') ?>
<!--=========================================================================================-->

<?= $this->Section('title') ?>
Tulis Pengaduan
<?= $this->endSection() ?>

<!--=========================================================================================-->

<?= $this->Section('content') ?>

<!-- Container ==============================================================================-->
<div class="container px-5 mt-4">

    <!-- Heading ===============================================-->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tulis Pengaduan</h1>
        <nav class="mt-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
            </ol>
        </nav>


    </div>
    <!--========================================================-->


    <!-- Body ==================================================-->
    < <!--========================================================-->

</div>
<!--=========================================================================================-->

<!-- Modal ==================================================================================-->
<div class="modal fade" id="fPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header ================================================-->
            <div class="modal-header" style="background: #3D088C;">
                <h3 class="modal-title text-white " id="exampleModalLabel">Form Petugas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--========================================================-->

            <!-- Form ==================================================-->
            <form action="" id="editPetugas" method="post">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="password" id="pass" value="" class="form-control">
                    </div>
                    <div class="form-check mb-3" id="ubahpassword">
                        <input type="checkbox" class="form-check-input" name="ubahpassword" aria-label="Mau Ubah Password">
                        <label class="form-check-label" for="ubahpassword">Ubah Password</label>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level">
                            <option value="">Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer" style="background: #3D088C;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background: #00ADB5; color: white;"><i class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
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
        $("#fPetugas").on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var data = button.data('petugas');
            //alert("asa");

            if (data != "add") {

                const barisdata = data.split(",");
                // alert(barisdata[4]);
                $("#nama_petugas").val(barisdata[1]);
                $("#username").val(barisdata[2]);
                $("#password").val(barisdata[3]);
                $("#telp").val(barisdata[4]);
                $("#level").val(barisdata[5]);
                $("#editPetugas").attr('action', barisdata[6]);
                $("#ubahpassword").show();
                // alert(barisdata[6]);
                // $("#ubahpassword").show();
            } else {
                $("#nama_petugas").val("");
                $("#username").val("");
                $("#telp").val("");
                $("#level").val("");
                $("#editPetugas").attr('action', "savepetugas");
                $("#ubahpassword").hide();
            }
        });
    })
</script>
<?= $this->endSection() ?>

<!--=========================================================================================-->