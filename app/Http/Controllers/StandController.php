<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;

class StandController extends Controller
{
    //
    public function index(){
        $data = Stand::all();
    return view('stand.index', ['dataStand' => $data]);
    }

    public function create(){
        return view('stand.create');
    }

    public function store(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'nama_stand' => 'required',
            'alamat' => 'required',
        ], $message);

        $data = new stand;
        $data->nama_stand = $request->nama_stand;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('/tampil-stand')->with('success', 'Data berhasil disimpan');;
    }

    public function edit($id){
        $data = stand::find($id);
        return view('stand.edit', compact('data'));
    }

    public function update(Request $request, $id){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric',
            'nama_stand' => 'required',
            'alamat' => 'required',
        ], $message);

        $data = stand::find($id);
        $data->nama_stand = $request->nama_stand;
        $data->alamat = $request->alamat;
        $data->update();
        return redirect('/tampil-stand')->with('success', 'Data berhasil diubah');;
    }

    public function destroy($id){
        $data = stand::find($id);
        $data->delete();
        return redirect('/tampil-stand')->with('success', 'Data berhasil dihapus');;
    }

}
