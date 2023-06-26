<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class ProdukController extends Controller
{
    public function _construct(){
        $this->middleware('admin');
    }
    public function index(){
        $data = Produk::all();
            return view('produk.index', ['dataProduk' => $data]);
    }
    public function create(){
        return view('produk.create');
    }
    public function store(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|numeric|unique:produk',
            'nama_produk' => 'required|unique:produk',
            'kategori' => 'required|numeric',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $message);

        $data = new Produk;
        $data->id = $request->id;
        $data->nama_produk = $request->nama_produk;
        $data->kategori = $request->kategori_id;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->save();
        return redirect('/tampil-produk')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id){
        $data = produk::find($id);
        return view('produk.edit', compact('data'));
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
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $message);

        $data = produk::find($id);
        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->stock = $request->stock;
        $data->update();
        return redirect('/tampil-produk')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id){
        $data = produk::find($id);
        $data->delete();
        return redirect('/tampil-produk')->with('success', 'Data berhasil dihapus');
    }

}
