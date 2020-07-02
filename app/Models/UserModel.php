<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = "userlogin";
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['email','password','address','role'];
    public function createUsers($userInfo){
        $this->insert([
            'email' => $userInfo['email'],
            'password' => $userInfo['password'],
            'address' => $userInfo['address'],
            'role' => $userInfo['role'],
        ]);
    }
}
