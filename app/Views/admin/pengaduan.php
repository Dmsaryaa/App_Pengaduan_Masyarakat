<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Data Pengaduan
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container px-5 mt-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengaduan</h1>
        <nav class="mt-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengaduan </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="background: linear-gradient(to right, #3D088C, #05F7DF);">
                    <?php
                    if (session()->get('level') == 'masyarakat') {
                    ?> <h1 class="text-white mx-3 mt-2 mb-3">Pengaduan Masyarakat
                        &nbsp;
                        <a href="#" data-pengaduan="" class="btn text-white" data-target="#modalPengaduan"
                            data-toggle="modal" style="background: #00ADB5;"><i
                                class="fas fa-fw fa-solid fa-user-plus"></i></a>
                    </h1>

                    <?php }
                    if (session()->get('level') == 'petugas') {
                    ?> <h1 class="text-white mx-3 mt-2 mb-3">Pengaduan
                    </h1>
                    <?php
                    }
                    if (session()->get('level') == 'admin') {
                    ?> <h1 class="text-white mx-3 mt-2 mb-3">Pengaduan
                    </h1>
                    <?php
                    }
                    ?>
                </div>

                <div class="card-body">
                    <table class="table table-border">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Laporan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach ($pengaduan as $row) {
                            $no++;
                        ?>
                        <tr class="text-center">
                            <td><?= $no ?></td>
                            <td><?= $row['tgl_pengaduan'] ?></td>
                            <td><?= $row['isi_laporan'] ?></td>
                            <td>
                                <?php
                                    if ($row['foto'] != "") {
                                    ?>

                                <!--  -->
                                <img src="/upload/berkas/<?= $row['foto'] ?>" alt="" height="50" width="50">
                                <?php
                                    }
                                    ?>
                            </td>

                            <td>
                                <?php
                                    if (session('level') == 'masyarakat') {
                                        if ($row['status'] == '0') {
                                    ?>

                                <a onclick="return confirm('Yakin hapus data??');" class="btn btn-danger"
                                    href="/pengaduan/hapus/<?= $row['id_pengaduan'] ?>">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <?php

                                        } else {

                                        ?>

                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalTanggapan"
                                    data-pengaduan="<?= $row['id_pengaduan'] ?>" data-aduan="Selesai">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <?php

                                        }
                                    }
                                    if (!empty(session('level')) && session('level') !== 'masyarakat') {
                                        if ($row['status'] == '0') {
                                        ?>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalTanggapan"
                                    data-pengaduan="<?= $row['id_pengaduan'] ?>"><i class="fas fa-comment"></i></a>
                                <?php
                                        } else {
                                        ?>
                                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalTanggapan"
                                    data-pengaduan="<?= $row['id_pengaduan'] ?>" data-aduan="Selesai"><i
                                        class="fas fa-eye"></i></a>
                                <?php
                                        }
                                    }
                                    ?>
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

</div>

<div class="modal fade" id="modalPengaduan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #3D088C;">
                <h3 class="modal-title text-white ">Tambah Pengaduan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tambahpengaduan" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Isi Laporan</label>
                        <textarea class="form-control" name="isi_laporan" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer" style="background: #3D088C;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background: #00ADB5; color: white;"><i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTanggapan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #3D088C;">
                <h3 class="modal-title text-white ">Tanggapan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tanggapi" method="post">


                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="">Isi Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapans" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="background: #3D088C;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" id="btstanggapan" style="background: #00ADB5; color: white;"><i
                            class="fas fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
$(document).ready(function() {
    $('#modalTanggapan').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var data = button.data('pengaduan');
        var aduan = button.data('aduan');
        $('#id_pengaduan').val(data);
        if (aduan == "Selesai") {
            var query = "id_pengaduan=" + data;

            $('#btstanggapan').hide();
            $.ajax({

                url: "/getTanggapan",
                type: "GET",
                data: query,
                dataType: "json",

                success: function(data) {
                    $('#tanggapans').val(data[0].tanggapan);
                },
                error: function(error) {
                    console.log(error);
                }

            });

            $('#tanggapans').show();

        } else {
            $('#btstanggapan').show();
            $('#tanggapans').val("");
        }
    });
})
</script>

<!-- <script>
$(document).ready(function() {
    $('#ftanggapan').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);

        var data = button.data("pengaduan");
        var aduan = button.data("aduan");

        $("#id_pengaduan").val(data);
        if (aduan == "selesai") {
            var query = "id_pengaduan=" + data;

            $("#btstanggapan").hide();
            $.ajax({
                url: "/gettanggapan",
                type: "GET",
                data: query,
                dataType: "json",

                success: function(data) {
                    $("#tanggapans").val(data[0].tanggapan);
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
</script> -->
<?= $this->endSection() ?>