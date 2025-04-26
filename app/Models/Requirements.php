<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = [
        'document_id',
        'requirement',
        'requirement_show',
        'min',
        'max'
    ];

    public function inserir($dados) {
        $requirements = [
            ['height_of_cylinder_head', 'Altura do cabeçote (face inferior à face superior)'],
            ['parallelism_between_top_and_bottom_face', 'Desvio máximo do paralelismo face superior a face inferior'],
            ['flatness_of_the_fire_face_logitudinal', 'Planicidade da face inferior do cabeçote (longitudinal)'],
            ['flatness_of_the_fire_face_150mm', 'Planicidade da face inferior do cabeçote /150mm'],
            ['roughness_of_the_fire_face', 'Rugosidade da face inferior do cabeçote (Rz)'],
            ['height_of_the_intake_valve_to_cylinder_head_face', 'Altura da válvula de Admissão à face do cabeçote'],
            ['height_of_the_exhaust_valve_to_cylinder_head_face', 'Altura da válvula de Escape à face do cabeçote'],
            ['angle_of_the_intake_seat', 'Ângulo de assentamento da válvula na sede de Admissão'],
            ['angle_of_the_exhaust_seat', 'Ângulo de assentamento da válvula na sede de Escape'],
            ['intake_valve_guides_height', 'Altura das Guias de Valvulas Admissão'],
            ['exhaust_valve_guides_height', 'Altura das Guias de Valvulas Escape'],
            ['width_of_the_intake_valve_seat', 'Largura do assento de Vávula de Admissão'],
            ['width_of_the_exhaust_valve_seat', 'Largura do assento de válvula escape'],
            ['distance_between_intake_surface_and_exhaust_surface', 'Distância Entre Face de Admissão e Face de Escape'],
            ['diameter_of_the_camshaft_housing', 'Diâmetro do alojamento do eixo comando'],
            ['leak_test', 'Teste de estanquiedade'],
            ['vacuum_test', 'Teste de Vácuo'],
        ];

        foreach ($requirements as $requirement) {
            if ($requirement[0] == $dados['requirement']) {
                $requirement_show = $requirement[1];
            }
        }

        $cadastrar = $this->create([
            'document_id'       => $dados['document_id'],
            'requirement'       => $dados['requirement'],
            'requirement_show'  => $requirement_show,
            'min'               => $dados['min'],
            'max'               => $dados['max'],
        ]);

        if($cadastrar){
            return [
                'status' => true,
                'message' => 'Sucesso ao adicionar o requisito!'
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Falha ao adicionar o requisito!',
            ];
        }
    }
}
