<?php

namespace App\Http\Controllers;

use App\Models\infraccao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InfraccaoController extends Controller
{

    private $objMulta;
    public function __construct(){
        $this->objMulta = new infraccao();


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if (Gate::allows('AcessoAgente')){
            $estadoMulta = $this->objMulta->all()->where('estado','=','pendente');
            return view('infraccoes', compact('estadoMulta'));
            }else{
                return view('permission.permission');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInfraccao(Request $request)
    {
        if (Gate::allows('AcessoAdmin')){
            $utilizador = new infraccao();
            $utilizador->nome = $request->input('nome');
            $utilizador->email = $request->input('email');
            $utilizador->nrCarta = $request->input('nrCarta');
            $utilizador->categoria = $request->input('categoriaCarta');
            $utilizador->validade = $request->input('data');
            $utilizador->save();
            return redirect()->route('infraccao')->with('mensagem', 'Infraccao adicionada com sucesso!');
        }else{
            return view('permission.permission');
        }
    }

    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
