<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'admin_id',
        'description',
        'supplier',
        'supplier_number',
        'original_number',
        'autolinea_number',
        'report_number',
    ];

    public function inserir($dados) {
        $cadastrar = $this->create([
            'admin_id'          => Auth::guard('admin')->user()->id,
            'description'       => $dados['description'],
            'supplier'          => $dados['supplier'],
            'supplier_number'   => $dados['supplier_number'],
            'original_number'   => $dados['original_number'],
            'autolinea_number'  => $dados['autolinea_number'],
            'report_number'     => '01/25',
        ]);

        if($cadastrar){
            return [
                'status' => true,
                'message' => 'Sucesso ao cadastrar o documento!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao cadastrar o documento!',
            ];
        }
    }
}
