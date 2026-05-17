<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function generate(Request $request)
    {
    $request->validate([
        'type' => 'required'
    ]);

    /*
    |--------------------------------------------------------------------------
    | QR BIASA
    |--------------------------------------------------------------------------
    */

    if ($request->type == 'text') {

        $content = $request->content;
    }

    /*
    |--------------------------------------------------------------------------
    | QR PAYMENT / QRIS
    |--------------------------------------------------------------------------
    */

    else {

        // contoh QRIS dummy

        $content =
        "00020101021126670016COM.NOBUBANK.WWW01189360050300000879140214QRIS1234567895204581253033605405500005802ID5910TOKO TEST6013JAKARTA6105123456304ABCD";
    }

    /*
    |--------------------------------------------------------------------------
    | Generate QR
    |--------------------------------------------------------------------------
    */

    $qr = QrCode::size(300)
        ->generate($content);

    return view('welcome', compact('qr', 'content'));
    }
}