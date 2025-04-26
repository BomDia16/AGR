<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Admins extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function getAuthPassword() {
        return $this->password;
    }

    public function login($dados) {
        $credenciais = [
            'email'     => $dados['email'],
            'password'  => $dados['password']
        ];
        return Auth::guard('admin')->attempt($credenciais);
    }

    public function logout() {
        return Auth::guard('admin')->logout();
    }

    public function inserir($dados) {
        $cadastrar = $this->create([
            'name'          => $dados['name'],
            'email'         => $dados['email'],
            'password'      => bcrypt($dados['password']),
        ]);

        if($cadastrar){
            return [
                'status' => true,
                'message' => 'Sucesso ao cadastrar o admin!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao cadastrar o admin!',
            ];
        }
    }
}
