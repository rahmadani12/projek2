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
            'content' => 'required'
        ]);

        // Generate QR SVG
        $qr = QrCode::size(300)
            ->generate($request->content);

        // Kirim langsung ke view
        return view('welcome', compact('qr'));
    }
}