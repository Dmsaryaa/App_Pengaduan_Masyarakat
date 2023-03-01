<?= $this->extend('layouts/admin') ?>
<!--=========================================================================================-->

<?= $this->Section('title') ?>
Data Laporan
<?= $this->endSection() ?>

<!--=========================================================================================-->

<?= $this->Section('content') ?>

<!-- Container ==============================================================================-->
<div class="container" style="padding-top: 20px;">
    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-header bg-info text-center fw-bold">
                    INPUT DATA
                </div>
                <div class="card-body">
                    <div class="col-lg-6">
                        <form action="/laporan/filter" method="post" class="row" style="padding-bottom: 20px;">
                            <div class="col">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="0">Pending</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=========================================================================================-->

<?= $this->endSection() ?>


<!--=========================================================================================-->

<?= $this->Section('script') ?>

<?= $this->endSection() ?>

<!--=========================================================================================-->