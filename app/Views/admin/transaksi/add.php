<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12" ng-controller="transaksiController">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Harga</h4>
                </div>
                <form class="forms-sample" ng-submit=save()>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategori">Kategori Laundry</label>
                            <select class="form-control" ng-options="item.kategori for item in datas.kategori" ng-model="kategori" ng-change="model.kategori_id = kategori.id; model.kategori=kategori.kategori"></select>
                        </div>
                        <div class="form-group">
                            <label for="layanan">Layanan</label>
                            <select class="form-control" ng-options="item.layanan for item in datas.layanan" ng-model="layanan" ng-change="model.layanan_id = layanan.id; model.layanan=layanan.layanan"></select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control col-md-5" ng-model="model.harga" ui-number-mask="0"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-primary text-white">.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="text" class="form-control" id="layanan" placeholder="Waktu pengerjaan" ng-model="model.waktu" /> -->
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" placeholder="Satuan" ng-model="model.satuan" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                        <button class="btn btn-secondary">Batal</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Harga</h4>
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