angular.module('adminctrl', [])
    // Admin
    .controller('dashboardController', dashboardController)
    .controller('kategoriController', kategoriController)
    .controller('layananController', layananController)
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
            if($scope.model.id){
                kategoriServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            }else{
                kategoriServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param)=>{
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
            if($scope.model.id){
                layananServices.put($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })
            }else{
                layananServices.post($scope.model).then(res => {
                    pesan.Success("Process Success");
                    $scope.model = {};
                    $.LoadingOverlay('hide');
                })

            }
        })
    }

    $scope.edit = (param)=>{
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