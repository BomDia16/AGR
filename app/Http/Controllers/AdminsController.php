<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    private $totalPage = 10;
    
    private $admin;

    public function __construct(Admins $admin)
    {
        $this->admin = $admin;
    }

    public function welcome() {
        if (Auth::guard('admin')->check()) {
            return view('admins.home');
            /*
                Lembre-se disso:
                Auth::guard('admin')->user()->id
            */
        }
        // return view('admins.home');
        return redirect()->route('admin.view');
    }

    public function index_login() {
        return view('admins.login');
    }

    // Autenticação

    public function login(Request $request) {
        $dados = $request->all();
        $login = $this->admin->login($dados);
        if(!$login) {
            return back()
                    ->withInput()
                    ->withErrors([
                        'As credenciais fornecidas não correspondem aos nossos registros.'
                    ]);
        }
        return redirect()->intended(route('welcome'));
    }

    public function logout() {
        $this->admin->logout();
        return redirect()->route('admin.view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->admin->orderBy('id', 'ASC')->paginate($this->totalPage);

        if (Auth::guard('admin')->check()) {
            return view('admins.index',
                        compact('admins'));
            /*
                Lembre-se disso:
                Auth::guard('admin')->user()->id
            */
        }
        
        return redirect()->route('admin.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admins.create');
            /*
                Lembre-se disso:
                Auth::guard('admin')->user()->id
            */
        }
        // return view('admins.home');
        return redirect()->route('admin.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        
        $inserir = $this->admin->inserir($dados);
        if($inserir['status']) {
            return redirect()->route('admin.index');
        }
        return redirect()
                ->back()
                ->withErrors($inserir['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            if (!$admins = $this->admin->find($id)) {          
                return redirect()->route('admin.index');
            }

            return view('admins.edit', compact('admins'));
        }

        return redirect()->route('admin.view');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$admins = $this->admin->find($id)) {          
            return redirect()->route('admin.index');
        }

        $dados = $request->all();

        $editando = $admins->update($dados);

        if($editando) {
            return redirect()->route('admin.index');
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->admin->findOrFail($id)->delete();

        return redirect()->route('admin.index');
    }
}
