<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\models\User;

class PegawaiController extends Controller
{
    //
    public function index(){
        $data = Pegawai::all();
    return view('pegawai.index', ['dataPegawai' => $data]);
    }

    public function create(){
        return view('pegawai.create');
    }

    public function store(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric|unique:pegawai',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|numeric|unique:pegawai',
            'phone' => 'required',
            'alamat' => 'required',
        ], $message);

        $data = new Pegawai;
        $data->id = $request->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('/tampil-karyawan')->with('success', 'Data berhasil disimpan');;
    }

    public function edit($id){
        $data = pegawai::find($id);
        return view('pegawai.edit', compact('data'));
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
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            // 'phone' => 'required',
            // 'alamat' => 'required',
        ], $message);

        $data = user::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->level = $request->level;
        // $data->phone = $request->phone;
        // $data->alamat = $request->alamat;
        $data->update();
        return redirect('/tampil-karyawan')->with('success', 'Data berhasil diubah');;
    }

    public function destroy($id){
        $data = user::find($id);
        $data->delete();
        return redirect('/tampil-karyawan')->with('success', 'Data berhasil dihapus');;
    }


    public function pdfPegawai(){
        $data = pegawai::all();
        return view('Pegawai.pdfPegawai', ['dataPegawai' => $data]);
    }
}
