<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\ChamadoEncerrado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamadoEncerradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $chamado_enc = DB::table('chamado_encerrados')
                        ->select('chamado_encerrados.*')
                        ->get();
        return view('chamado_encerrado.index',['chamado_enc' => $chamado_enc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $chamado_enc = New ChamadoEncerrado;
        $chamado_enc->id_chamado = $id;
        $chamado_enc->save();
        echo 'Sucesso';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {   
        $user = auth()->user();
        $chamado_enc = New ChamadoEncerrado;
        $chamado_enc->id_chamado = $id;
        $chamado_enc->tecnico = $user->name;
        $usuario = DB::table('chamado')->join('users','users.id','=','chamado.id_user')->select('chamado.*','users.*')->where('chamado.id_chamado','=',$id)->get();
        $usr = json_decode($usuario);
        $chamado_enc->usuario = $usr[0]->name;
        $chamado_enc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo '1';
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
    public function destroy()
    {
        
    }

}
