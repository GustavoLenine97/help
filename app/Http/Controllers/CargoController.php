<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    public function index()
    {
        $cargo = DB::table('cargo')->select('id_cargo','cargo')->paginate(1);
        return view('cargo.index',['cargo' => $cargo]);
    }

    public function formCadastrarCargo()
    {
        return view("cargo.form");
    }

    public function save(Request $req)
    {
        $cargo = new Cargo;
        $cargo->cargo = $req->cargo;
        $cargo->save();
        return redirect('cargo');
    }

    protected function formDeletarCargo()
    {
        $cargo = DB::table('cargo')->select('id_cargo','cargo')->get();
        return view('cargo.delete',['cargo' => $cargo]);
    }

    protected function delete(Request $req)
    {
        $cargo = new Cargo;
        $cargo->id_cargo = $req->id_cargo;
        DB::table('cargo')->where('id_cargo','=',$cargo->id_cargo)->delete();
        return redirect('cargo');
    }

    protected function formUpdateCargo()
    {
        $cargo = DB::table('cargo')->select('id_cargo','cargo')->get();
        return view('cargo.formUpdate',['cargo' => $cargo]);
    }

    protected function formAtualizarCargo(Request $req)
    {
        $cargo = DB::table('cargo')->where('id_cargo','=',$req->id_cargo)->get();
        return view('cargo.update',['cargo' => $cargo]);
    }

    protected function update(Request $req)
    {
        $cargo = new Cargo;
        $cargo->id_cargo = $req->id_cargo;
        $cargo->cargo = $req->cargo;

        $cargo = DB::table('cargo')->where('id_cargo','=',$cargo->id_cargo)
                    ->update([
                        'cargo' => $cargo->cargo
                    ]);
        return redirect('cargo');
    }

}
