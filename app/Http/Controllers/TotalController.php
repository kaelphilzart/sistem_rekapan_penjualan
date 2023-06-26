<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TotalController extends Controller
{
    //
    public function calculate(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
        ]);

        // Mendapatkan nilai dari inputan
        $number1 = $request->input('harga');
        $number2 = $request->input('jumlah');

        // Melakukan perkalian
        $result = $number1 * $number2;
}
}
