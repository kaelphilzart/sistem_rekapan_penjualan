<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Stand;
use  WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PenjualanController extends Controller
{
public $statusUpdate = false;
public $paginate = 5;
public $search;

    public function index(Request $request){
        $data = Penjualan::all();

        if($request->has('search')){
            $data = Penjualan::where('nama','LIKE','%' .$request->search. '%')->paginate(5);
        }else{
            $data = Penjualan::paginate(5);
        }
    return view('penjualan.index', ['dataPenjualan' => $data]);
    }

    public function index1(){
        // $data = Penjualan::all();
        $currentDate = Carbon::now()->toDateString();
        $namaPengguna = Auth::user()->name;

        $data = Penjualan::where('tanggal', $currentDate)
         ->where('nama', $namaPengguna)
        ->get();
        
    return view('transaksi.index', ['dataPenjualan' => $data]);
    }

    public function create(){
        $data1 = Menu::all();
        $data2 = Stand::all();
        return view('transaksi.create', ['dataMenu' => $data1, 'dataStand' => $data2]);
    }

    public function store(Request $request){
        //validasi form
        $message= [
            'required' =>':attribute tidak boleh kosong',
            'unique' => 'attribute sudah digunakan',
            'numeric' => 'attribute harus berupa angka',
        ];

        $this->validate($request, [
            'tanggal' => 'required',
            'nama' => 'required',
            'menu' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'total' => 'numeric',
        ], $message);

        $data = new Penjualan;
        $data->stand = $request->stand;
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->menu = $request->menu;
        $data->harga = $request->harga;
        $data->jumlah = $request->jumlah;
        $data->total = $request->total;
        $data->save();
        return redirect('/tampil-transaksi')->with('success', 'Pembelian Berhasil');
    }
// Contoh pemanggilan metode dalam Controller
public function update(Request $request, $id)
{
    $data = Penjualan::findOrFail($id);
    $data->fill($request->all());
    $data->fillProductTotalColumn();
    // ...
}

    // public function edit($id){
    //     $data = perpus::find($id);
    //     return view('perpus.edit', compact('data'));
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
    //         'judul' => 'required',
    //         'penerbit' => 'required',
    //         'pengarang' => 'required',
    //         'tahun' => 'required|numeric',
    //     ], $message);

    // public function destroy($id){
    //     $data = perpus::find($id);
    //     $data->delete();
    //     return redirect('/tampil-perpus')->with('success', 'Data berhasil dihapus');;
    // }

//     public function search(Request $request)
// {
//     $keyword = $request->input('keyword');
//     $users = Penjualan::search($keyword)->get();
//     return view('penjualan', compact('penjualan'));
// }
    // public function search(Request $request)
    // {
    //     $keyword = $request->search;
    //     $penjualan = Penjualan::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
    //     return view('penjualan.index', compact('penjualan'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    

    public function palingLaris()
    {
        $PalingLaris = Penjualan::orderBy('total', 'desc')
            ->first();
    
        return $PalingLaris;
    }
    
    public function tampilMenu()
{
    $PalingLaris = $this->palingLaris();

    // Lakukan sesuatu dengan menu yang paling laris, misalnya mengirimkannya ke tampilan
    return view('penjualan.index', ['menu' => $PalingLaris]);
}


    public function pdfPenjualan(){
        $data = penjualan::all();
        return view('Penjualan.pdfPenjualan', ['dataPenjualan' => $data]);
    }



    // public function hitung(Request $request)
    // {
    //     $kolom1 = $request->input('harga');
    //     $kolom2 = $request->input('jumlah');

    //     $total = $kolom1 * $kolom2;

    //     return response()->json(['total' => $total]);
    // }

//     public function fillProductTotalColumn()
// {
//     DB::table('nama_tabel')
//         ->update([
//             'product_total' => DB::raw('kolom_1 * kolom_2')
//         ]);
// }
}

