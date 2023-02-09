<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pc_gamer;

class PcGamerController extends Controller
{
    public function index()
    {
        return pc_gamer::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'modelo' => 'required',
            'preco' => 'required',
            'foto' => 'required',
        ]);
        pc_gamer::create($request->all());
    }

    public function show($id)
    {
        return pc_gamer::findorfail($id);
    }

    public function update(Request $request, $id)
    {
        $pcGamer=pc_gamer::findorfail($id);
        $pcGamer->update($request->all());
        return $pcGamer;
    }

    public function destroy($id)
    {
        return pc_gamer::destroy($id);
    }
}
