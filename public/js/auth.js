angular.module('auth', ['auth.service', 'helper.service', 'message.service'])
    .controller('loginController', loginController)
    .controller('registerController', registerController);


function loginController($scope, AuthService, helperServices, pesan) {
    $scope.role = [];
    $scope.model = {};
    $scope.roles = [];
    $scope.title = "Login";
    $scope.$emit("SendUp", $scope.title);
    sessionStorage.clear();
    $scope.login = ()=>{
        $.LoadingOverlay("show");
        AuthService.login($scope.model).then((res)=>{
            document.location.href= helperServices.url;
        })
    }
    $scope.setRole = (item)=>{
        AuthService.setRole(item).then((res)=>{
            document.location.href= helperServices.url;
        })
    }
}

function registerController($scope, AuthService, helperServices, pesan) {
    $scope.role = [];
    $scope.model = {};
    $scope.roles = [];
    $scope.jurusan = [];
    $scope.title = "Register";
    $scope.$emit("SendUp", $scope.title);
    sessionStorage.clear();
    $scope.regis = () => {
        console.log($scope.model);
        pesan.dialog('Pastikan data sudah benar! \n Yakin ingin melakukan registrasi akun?', 'Ya', 'Tidak').then(x=>{
            console.log($scope.model);
            $.LoadingOverlay("show");
            AuthService.regis($scope.model).then(res=>{
                $scope.model = {};
                pesan.Success("Testing");
                $.LoadingOverlay("hide");
                pesan.dialog("Akun berhasil di daftarkan! \n klik 'OK' untuk Login", "OK", false, "success").then(x=>{
                    document.location.href = helperServices.url + "auth";
                });
            })
        })
    }
    $scope.setRole = (item) => {
        AuthService.setRole(item).then((res) => {
            document.location.href = helperServices.url;
        })
    }

}
