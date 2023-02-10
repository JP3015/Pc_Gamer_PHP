<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pc_gamer;
use Illuminate\Support\Facades\File;

class PcGamerController extends Controller
{
    public function index()
    {
        $pcGamers = pc_gamer::all();
        return view('index', compact('pcGamers'));
    }

    public function store(Request $request)
    {
        $foto = $request->foto;
        if($foto) {
            $img_ext = $foto->getClientOriginalExtension();
            $filename = time() . '.' . $img_ext;
            $foto->move(public_path('storage/images'), $filename);
        }

        pc_gamer::create([
            'tipo' => $request->tipo,
            'modelo' => $request->modelo,
            'preco' => str_replace(['.', ','], ['', '.'], $request->input('preco')),
            'foto' => $request->foto ? $filename: '0.png',
        ]);
        
        return redirect('api');
    }

    public function show($id)
    {
        return pc_gamer::findorfail($id);
    }

    public function update(Request $request, $id)
    {
        $pcGamer = pc_gamer::find($id);
        $pcGamer->tipo = $request->input('tipo');
        $pcGamer->modelo = $request->input('modelo');
        $pcGamer->preco = str_replace('.','',$request->input('preco'));
        $pcGamer->preco = str_replace(',','.',$pcGamer->preco);
        

        if($request->hasFile('foto')) 
        {
            $destination = public_path('storage/images').$pcGamer->foto;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $foto = $request->file('foto');
            $img_ext = $foto->getClientOriginalExtension();
            $filename = time() . '.' . $img_ext;
            $foto->move(public_path('storage/images'), $filename);
            $pcGamer->foto =  $request->foto ? $filename: '0.png';
        }
        
        $pcGamer->update();
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        pc_gamer::destroy($id);
        return redirect('api');
    }


    public function edit($id)
    {
        $pcGamer = pc_gamer::find($id);
        return view('edit', compact('pcGamer'));
    }
}
    