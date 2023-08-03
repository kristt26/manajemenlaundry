<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-warning">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Jumlah Proses</p>
                            <h2 class="text-white"> <?= $proses?>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Jumlah Selesai</p>
                            <h2 class="text-white"> <?= $selesai?>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Pendapatan</p>
                            <h2 class="text-white"> <?= 'Rp '.number_format($total,0,',','.')?>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-cash-multiple bg-inverse-icon-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>