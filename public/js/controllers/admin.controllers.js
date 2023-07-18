angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('kategoriController', kategoriController)
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

    $scope.approve = (param) => {
        pesan.dialog('Yakin ingin menerima ?', 'Ya', 'Tidak').then(x => {
            $.LoadingOverlay('show');
            kategoriServices.post(param).then(res => {
                var index = $scope.datas.daftar.indexOf(param);
                $scope.datas.daftar.splice(index, 1);
                $scope.datas.laboran.push(angular.copy(param));
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

    $scope.delete = (param) => {
        pesan.dialog('Yakin ingin membatalkan ?', 'Ya', 'Tidak').then((x) => {
            $.LoadingOverlay('show');
            kategoriServices.deleted(param.pendaftaran_laboran_id).then(res => {
                var index = $scope.datas.daftar.indexOf(param);
                $scope.datas.daftar.splice(index, 1);
                pesan.Success("Process Success");
                $.LoadingOverlay('hide');
            })
        })
    }

}