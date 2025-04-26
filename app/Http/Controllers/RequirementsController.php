<?php

namespace App\Http\Controllers;

use App\Models\Requirements;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    private $requirement;

    public function __construct(Requirements $requirement)
    {
        $this->requirement = $requirement;
    }

    public function store(Request $request){
        $dados = $request->all();
        foreach($this->requirement->get() as $requires) {
            if ($dados['requirement'] == $requires->requirement && $dados['document_id'] == $requires->document_id) {
                $status = [
                    'status' => false,
                    'message' => 'Não é possível inserir o mesmo requisito duas vezes',
                ];

                return redirect()
                        ->back()
                        ->with('error', $status['message']);
            }
        }

        $inserir = $this->requirement->inserir($dados);
        if($inserir['status']) {
            return redirect()->route('document.edit', $dados['document_id']);
        }
        return redirect()
                ->back()
                ->withErrors($inserir['message']);
    }

    public function destroy($id){
        $this->requirement->findOrFail($id)->delete();

        return redirect()->back();
    }
}
