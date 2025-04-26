<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
