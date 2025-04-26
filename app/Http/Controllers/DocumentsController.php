<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Requirements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    private $totalPage = 10;

    private $document;

    public function __construct(Documents $document)
    {
        $this->document = $document;
    }

    public function index() {
        $documents = $this->document->orderBy('id', 'ASC')->paginate($this->totalPage);

        if (Auth::guard('admin')->check()) {
            return view('documents.index',
                        compact('documents'));
            /*
                Lembre-se disso:
                Auth::guard('admin')->user()->id
            */
        }
        // return view('admins.home');
        return redirect()->route('admin.view');
    }

    public function create(){
        if (Auth::guard('admin')->check()) {
            return view('documents.create');
        }
        return redirect()->route('admin.view');
    }

    public function store(Request $request){
        $dados = $request->all();
        
        $inserir = $this->document->inserir($dados);
        if($inserir['status']) {
            return redirect()->route('document.index');
        }
        return redirect()
                ->back()
                ->withErrors($inserir['message']);
    }

    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            if (!$documentos = $this->document->find($id)) {          
                return redirect()->route('document.index');
            }
            $requisitos = Requirements::where('document_id', '=', $documentos->id)->get();

            return view('documents.edit', compact('documentos', 'requisitos'));
        }

        return redirect()->route('admin.view');
    }

    public function update(Request $request, $id)
    {
        $dados = $request->all();

        if (!$documents = $this->document->find($id)) {          
            return redirect()->route('document.edit', $dados['id']);
        }

        $editando = $documents->update($dados);

        if($editando) {
            $message = 'Sucesso ao editar o seu perfil!';
            return redirect()->back()->with('success', $message);
        }
        
        return redirect()->back();
    }
}
