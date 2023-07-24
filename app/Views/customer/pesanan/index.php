<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12" ng-controller="pesananController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History Pesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tabel-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode Pesanan</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.tanggal}}</td>
                                    <td>{{item.kode}}</td>
                                    <td>{{item.layanan}}</td>
                                    <td>{{item.status}}</td>
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