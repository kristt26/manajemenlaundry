angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('kategoriController', kategoriController)
    .controller('layananController', layananController)
    .controller('hargaController', hargaController)
    .controller('pesananController', pesananController)
    .controller('transaksiController', transaksiController)
    .controller('addController', addController)
    ;

function dashboardController($scope, dashboardServices) {
    $scope.$emit("SendUp", "Dashboard");
    $scope.datas = {};
    $scope.title = "Dashboard";
    // dashboardServices.get().then(res=>{
    //     $scope.datas = res;
    // })
}

function kategoriController($scope, kategoriServices, pesan) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.dataKamar = {};
    $.LoadingOverlay('show');
    kategoriServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                kategoriServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            } else {
                kategoriServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            kategoriServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}
function layananController($scope, layananServices, pesan) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.dataKamar = {};
    $.LoadingOverlay('show');
    layananServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                layananServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            } else {
                layananServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            layananServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}

function hargaController($scope, hargaServices, pesan) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.dataKamar = {};
    $.LoadingOverlay('show');
    hargaServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                hargaServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            } else {
                hargaServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
        $scope.kategori = $scope.datas.kategori.find(x => x.id = param.kategori_id);
        $scope.layanan = $scope.datas.layanan.find(x => x.id = param.layanan_id);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            hargaServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}

function transaksiController($scope, transaksiServices, pesan) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.model.layanan = {};
    $scope.model.detail = {};
    $scope.dataKamar = {};
    $.LoadingOverlay('show');
    transaksiServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                transaksiServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            } else {
                transaksiServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
        $scope.kategori = $scope.datas.kategori.find(x => x.id = param.kategori_id);
        $scope.layanan = $scope.datas.layanan.find(x => x.id = param.layanan_id);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            transaksiServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}

function addController($scope, transaksiServices, pesan, helperServices) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.model.layanan = {};
    $scope.model.detail = [];
    $scope.model.trx = {};
    $scope.dataKamar = {};
    $scope.itemBayar = 0;
    $scope.kategori = undefined;
    $.LoadingOverlay('show');
    transaksiServices.getAdd().then((res) => {
        $scope.datas = res;
        $scope.model.layanan.kode = 'PSN-' + Math.floor((Math.random() * 100000));
        $scope.model.layanan.tanggal = helperServices.dateToString(new Date());
        var data = sessionStorage.getItem('data');
        if (data) {
            $scope.model = JSON.parse(data);
            $scope.model.trx.total = 0
            $scope.model.detail.forEach(element => {
                $scope.model.trx.total += parseFloat(element.total);
            });
        }
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.hitung = (item, param) => {
        if (item == 'item') {
            var data = $scope.datas.harga.find(x => x.kategori_id == param.id && x.layanan_id == $scope.model.layanan.layanan_id);
            if (data) {
                param.harga = data.harga;
                param.harga_id = data.id;
                param.satuan = data.satuan;
            }
            if (param.jumlah) {
                param.total = parseFloat(param.jumlah) * parseFloat(param.harga);

                if ($scope.model.detail.length > 0) {

                }
            }
        }
        console.log(param);
        // if(item == '' )

    }

    $scope.setBayar = ()=>{
        var nilai = $scope.model.trx.bayar - parseFloat($scope.model.trx.total);
        if(nilai>=0){
            $scope.model.trx.sisa = 0;
            $scope.model.trx.status = 'Lunas';
            $scope.model.trx.kembali = nilai;
        }else{
            $scope.model.trx.kembali = 0;
            $scope.model.trx.sisa = nilai*-1;
            $scope.model.trx.status = 'Pending';
        }
    }

    $scope.add = (param) => {
        $scope.model.detail.push(angular.copy(param));
        $scope.kategori = undefined;
        $scope.model.trx.total = 0
        $scope.model.detail.forEach(element => {
            $scope.model.trx.total += parseFloat(element.total);
        });
        sessionStorage.setItem('data', JSON.stringify($scope.model));
    }

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            transaksiServices.post($scope.model).then(res => {
                pesan.Success("Process Success");
                $scope.model = {};
                sessionStorage.removeItem('data');
                document.location.href = helperServices.url + 'transaksi'
            })
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
        $scope.kategori = $scope.datas.kategori.find(x => x.id = param.kategori_id);
        $scope.layanan = $scope.datas.layanan.find(x => x.id = param.layanan_id);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            transaksiServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}

// Customer
function pesananController($scope, pesananServices, pesan) {
    $scope.$emit("SendUp", "Laboran");
    $scope.datas = {};
    $scope.model = {};
    $scope.dataKamar = {};
    $.LoadingOverlay('show');
    pesananServices.get().then((res) => {
        $scope.datas = res;
        console.log(res);
        $.LoadingOverlay('hide');
    })

    $scope.save = () => {
        pesan.dialog('Anda Yakin ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            if ($scope.model.id) {
                pesananServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            } else {
                pesananServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param) => {
        $scope.model = angular.copy(param);
        $scope.kategori = $scope.datas.kategori.find(x => x.id = param.kategori_id);
        $scope.layanan = $scope.datas.layanan.find(x => x.id = param.layanan_id);
    }

    $scope.delete = (param) => {
        pesan.dialog('Anda yakin ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            pesananServices.deleted(param).then(res => {
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}