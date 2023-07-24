<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        if ($user->countAllResults() == 0)
            $user->insert(['username' => 'Administrator', 'password' => password_hash('Administrator#1', PASSWORD_DEFAULT), 'akses' => 'Admin']);
        return view('sign_in');
    }

    public function login(): object
    {
        $user = new UserModel();
        $customer = new CustomerModel();
        $param = $this->request->getJSON();
        $itemUser = $user->where('username', $param->username)->first();
        if (!is_null($itemUser)) {
            if (password_verify($param->password, $itemUser->password)) {
                if ($itemUser->akses == 'Admin') {
                    $itemSessi = ['uid' => $itemUser->id, 'nama' => 'Administrator', 'akses'=>$itemUser->akses, 'isRole' => true];
                    session()->set($itemSessi);
                } else {
                    $itemCustom = $customer->where('user_id', $itemUser->id)->first();
                    $itemSessi = ['uid' => $itemUser->id, 'nama' => $itemCustom->nama, 'akses'=>$itemUser->akses, 'isRole' => true];
                    session()->set($itemSessi);
                }
                return $this->respond(true);
            } else
                return $this->fail('Password yang anda masukkan salah');
        } else {
            return $this->fail('Username tidak ditemukan');
        }
    }

    public function reg()
    {
        return view('sign_up');
    }

    public function daftar()
    {
        $param = $this->request->getJSON();
        $user = new UserModel();
        $customer = new CustomerModel();
        $conn = \Config\Database::connect();
        try {
            $conn->transBegin();
            if($user->where('username', $param->username)->countAllResults()>0){
                throw new \Exception("Username sudah didaftarkan", 1);
            }
            $user->insert(['username' => $param->username, 'password' => password_hash($param->password, PASSWORD_DEFAULT), 'akses' => 'Customer']);
            $param->user_id = $user->getInsertID();
            $customer->insert($param);
            if ($conn->transStatus()) {
                $conn->transCommit();
                return $this->respond(true);
            } else
                throw new \Exception("Registrasi Gagal", 1);
        } catch (\Throwable $th) {
            $conn->transRollback();
            return $this->fail($th->getMessage());
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
