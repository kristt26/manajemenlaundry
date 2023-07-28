<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12" ng-controller="addController">
    <form class="forms-sample" ng-submit=save()>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#biodata">
                        <h4 class="card-title">Biodata</h4>
                    </div>
                    <div class="card-body collapse show" id="biodata">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" ng-model="model.nama" placeholder="Nama pelanggan" required />
                                </div>
                                <div class="form-group">
                                    <label for="hp">Kontak</label>
                                    <input type="text" class="form-control" id="hp" ng-model="model.hp" placeholder="No Kontak aktif" required/>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" class="form-control" rows="3" ng-model="model.alamat" required>Alamat</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode">Kode Pesanan</label>
                                    <input type="text" class="form-control" id="kode" ng-model="model.layanan.kode" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" ng-model="model.layanan.tanggal" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Layanan Laundry</label>
                                    <select class="form-control" ng-options="item.layanan for item in datas.layanan" ng-model="lay" ng-change="model.layanan.layanan_id = lay.id" required></select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" ng-show="model.layanan.layanan_id">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pilih Laundry</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategori">Kategori Laundry</label>
                            <select class="form-control" ng-options="item.kategori for item in datas.kategori" ng-model="kategori" ng-change="hitung('item',kategori)"></select>
                        </div>
                        <div class="form-group" ng-show="kategori">
                            <label for="harga">Harga Satuan</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control col-md-5" ng-model="kategori.harga" ui-number-mask="0" disabled />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-secondary text-white">/{{kategori.satuan}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" ng-show="kategori">
                            <label for="harga">Banyaknya</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" class="form-control col-md-5" ng-model="kategori.jumlah" ng-change="hitung('item',kategori)" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-secondary text-white">{{kategori.satuan}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" ng-show="kategori">
                            <label for="harga">Total</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control col-md-5" ng-model="kategori.total" ui-number-mask="0" disabled />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-secondary text-white"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary mr-2" ng-click="add(kategori)">Tambah </button>
                    </div>
                </div>
            </div>
            <div class="col-md-8" ng-show="model.layanan.layanan_id">
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
                                        <th>Jenis Laundry</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in model.detail track by item.id">
                                        <td>{{$index+1}}</td>
                                        <td>{{item.kategori}}</td>
                                        <td>{{item.harga}}</td>
                                        <td>{{item.jumlah}}</td>
                                        <td class="text-right" width ="20%">{{item.total | currency}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" ng-click="edit(item)"><i class="mdi mdi-lead-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm" ng-click="delete(item)"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Total Tagihan</td>
                                        <td class="text-right">{{model.trx.total | currency}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total Bayar</td>
                                        <td><input type="text" class="form-control text-right" ng-model="model.trx.bayar" ng-change="setBayar()" ui-number-mask = "0"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Sisa Tagihan</td>
                                        <td class="text-right">{{model.trx.sisa | currency}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Kembalian</td>
                                        <td class="text-right">{{model.trx.kembali | currency}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3 text-right" ng-show="model.detail.length>0">
                <button type="submit" class="btn btn-info mr-2">Simpan </button>
            </div>

        </div>
    </form>
</div>
<?= $this->endSection() ?>