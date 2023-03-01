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
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
        <nav class="mt-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
            </ol>
        </nav>


    </div>
    <!--========================================================-->


    <!-- Body ==================================================-->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="background: linear-gradient(to right, #3D088C, #05F7DF);">
                    <h1 class="text-white mx-3 mt-2 mb-3">Petugas
                        &nbsp;
                        <a href="" data-toggle="modal" data-target="#fPetugas" data-petugas="add" class="btn text-white"
                            style="background: #00ADB5;">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    </h1>
                    <!-- <a href="/fpetugas" class="btn btn-success">Tambah Data</a> -->
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr class="text-center">
                            <th class="col-lg-1">No</th>
                            <th class="col-lg-2">Nama</th>
                            <th class="col-lg-3">Username</th>
                            <th class="col-lg-3">Telp</th>
                            <th class="col-lg-1">Level</th>
                            <th class="col-lg-2">Aksi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($petugas as $row) {
                            $data = $row['id_petugas'] . "," . $row['nama_petugas'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . $row['level'] . "," . base_url('petugas/edit/' . $row['id_petugas']);
                            # code...
                            $no++;
                        ?>
                        <tr class="text-center">
                            <td><?= $no ?></td>
                            <td><?= $row['nama_petugas'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['telp'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#fPetugas"
                                    class="btn btn-warning text-white" data-petugas="<?= $data ?>"><i
                                        class="fas fa-edit"></i></a>
                                <a href="/petugas/hapus/<?= $row['id_petugas'] ?>"
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
                        <input type="text" name="username" id="username" value="<?=$nama?>" class="form-control">
                    </div>
                    <div class="form-group">p
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" value="<?=$nama?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="pass" value="<?=$nama?>" class="form-control">
                    </div>
                    <div class="form-check mb-3" id="ubahpassword">
                        <input type="checkbox" class="form-check-input" name="ubahpassword"
                            aria-label="Mau Ubah Password">
                        <label class="form-check-label" for="ubahpassword">Ubah Password</label>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level">
                            <option value="<?=$nama?>">Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
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
<!-- <script>
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
            $("# ").hide();
        }
    });
})
</script> -->


<script>
$(document).ready(function() {
    $('#ftanggapan').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);

        var button = button.data('pengaduan');
        var aduan = button.dta('aduan');

        $("#id_pengaduan").val(data);
        if (aduan == "selesai") {
            var query = "id_pengaduan=" + data;
            $("#btstanggapan").hide();

            $.ajax({
                url: "/getTanggapan",
                type: "GET",
                data: query,
                dataType: "json",

                success: function(data) {
                    $("#tanggapans").val(data[0], tanggapan);
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $("#tanggapans").show();
        } else {
            $("#btstanggapan").show();
            $("#tanggapans").val();
        }
    })
})
</script>
<?= $this->endSection() ?>

<!--=========================================================================================-->