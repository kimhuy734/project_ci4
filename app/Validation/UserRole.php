<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRole{
    public function validateUser( string $str, string $fields,array $data)
    {
        $pizza = new UserModel();
        $user = $pizza->where('email',$data['email'])
                        ->first();
        $user = $pizza->where('password',$data['password'])
                        ->first();
    
        if($user)
            return true;

        return password_verify($data['password'],$user['password']);
    }
}