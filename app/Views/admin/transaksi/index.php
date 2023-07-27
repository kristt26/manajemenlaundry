<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12" ng-controller="transaksiController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Transaksi</h4>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tabel-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Layanan Laundry</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.harga">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.layanan}}</td>
                                    <td>{{item.kategori}}</td>
                                    <td>Rp. {{item.harga | currency}}</td>
                                    <td>{{item.satuan}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" ng-click="edit(item)"><i class="mdi mdi-lead-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm" ng-click="delete(item)"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>