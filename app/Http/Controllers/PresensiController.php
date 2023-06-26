<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use Illuminate\Support\Facades\Validator;
use App\Models\Stand;
use Carbon\Carbon;
class PresensiController extends Controller
{
    //
    public function index(){
        $data = Presensi::all();
    return view('presensi.index', ['dataPresensi' => $data]);
    }

    public function index_stand(){
        $data = Stand::all();
    return view('presensi.create', ['dataStand' => $data]);
    }
    public function create(){
        return view('presensi.create');
    }

    
    // public function store(Request $request){
    //     //validasi form
    //     $message= [
    //         'required' =>':attribute tidak boleh kosong',
    //         'unique' => 'attribute sudah digunakan',
    //         'numeric' => 'attribute harus berupa angka',
    //     ];

    //     $this->validate($request, [
    //         'nama' => 'required',
    //         'tanggal' => 'required',
    //         'stand' => 'required',
    //         'status' => 'required',
    //     ], $message);

        
    //     $data = new Presensi;
        // $data->nama = $request->nama;
        // $data->tanggal = $request->tanggal;
        // $data->stand = $request->stand;
        // $data->status = $request->status;
        // $data->save();
    //     return redirect('/home')->with('success', 'Presensi berhasil');
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tanggal' => 'required|date',
            // Validasi lainnya
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Memeriksa apakah data absensi sudah ada
        $absensi = Presensi::where('tanggal', $request->tanggal)
            ->where('nama', $request->nama)
            ->first();
    
        if ($absensi) {
            return redirect('/home')->with('error', 'Anda sudah absen');
        }
    
        // Data absensi belum ada, simpan data baru
        Presensi::create($request->all());
        // $data->nama = $request->nama;
        // $data->tanggal = $request->tanggal;
        // $data->stand = $request->stand;
        // $data->status = $request->status;
        // $data->save();
    
        return redirect('/home')->with('success', 'Presensi berhasil');
    }
    

    // public function edit($id){
    //     $data = pegawai::find($id);
    //     return view('pegawai.edit', compact('data'));
    // }

    // public function update(Request $request, $id){
    //     //validasi form
    //     $message= [
    //         'required' =>':attribute tidak boleh kosong',
    //         'unique' => 'attribute sudah digunakan',
    //         'numeric' => 'attribute harus berupa angka',
    //     ];

    //     $this->validate($request, [
    //         'id' => 'required|numeric',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required|numeric',
    //         'phone' => 'required',
    //         'alamat' => 'required',
    //     ], $message);

    //     $data = pegawai::find($id);
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->password = $request->password;
    //     $data->phone = $request->phone;
    //     $data->alamat = $request->alamat;
    //     $data->update();
    //     return redirect('/tampil-karyawan')->with('success', 'Data berhasil diubah');;
    // }

    // public function destroy($id){
    //     $data = pegawai::find($id);
    //     $data->delete();
    //     return redirect('/tampil-karyawan')->with('success', 'Data berhasil dihapus');;
    // }


    public function pdfPresensi(){
        $data = presensi::all();
        return view('Presensi.pdfPresensi', ['dataPresensi' => $data]);
    }
}
