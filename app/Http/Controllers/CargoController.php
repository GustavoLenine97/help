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
        $cargo = DB::table('cargo')->select('id_cargo','cargo')->get();
        return view('cargo.index',['cargo' => $cargo]);
    }

    public function formCadastrarCargo()
    {
        return view("cargo.form");
    }

    public function save(Request $req)
    {
        // print_r($req->input());
        $cargo = new Cargo;
        $cargo->cargo = $req->cargo;
        $cargo->save();
        return redirect('cargo');

    }
}
