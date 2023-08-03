<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-md-12" ng-controller="transaksiController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Daftar Transaksi</h4>
                    <button class="btn btn-primary btn-sm" onclick="document.location.href='<?= base_url('transaksi/add')?>'"><i class="mdi mdi-plus" aria-hidden="true"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tabel-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Layanan Laundry</th>
                                    <th>Status Cuci</th>
                                    <th>Total Tagihan</th>
                                    <!-- <th>Bayar</th> -->
                                    <th>Sisa Tagihan</th>
                                    <th>Status Bayar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.layanan}}</td>
                                    <td>{{item.status}}</td>
                                    <td>Rp. {{item.transaksi.total | currency}}</td>
                                    <!-- <td>Rp. {{item.transaksi.bayar | currency}}</td> -->
                                    <td>Rp. {{item.transaksi.sisa | currency}}</td>
                                    <td>{{item.transaksi.status}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" ng-click="setItem(item)"><i class="mdi mdi-lead-pencil"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" ng-click="delete(item)"><i class="mdi mdi-delete"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Update Status Laundry</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form ng-submit="save()">
                                <div class="form-group">
                                  <label for="">Status</label>
                                  <select class="form-control" ng-model="model.status">
                                    <option value="Proses">Proses</option>
                                    <option value="Cuci">Cuci</option>
                                    <option value="Strika">Strika</option>
                                    <option value="Selesai">Selesai</option>
                                  </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?= $this->endSection() ?>