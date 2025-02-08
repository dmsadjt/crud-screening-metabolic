<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PasienController extends Controller
{
    public function new(Request $request) {
        $rules = ([
            'nama' => 'required',
            'kelamin' => 'required',
            'nik' => 'required|digits:16|unique:pasiens,nik'
        ]);

        $data = $request->validate($rules);

        $pasien = Pasien::create([
            'id' => Str::uuid(),
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['kelamin'],
            'nik' => $data['nik'],
        ]);

        return redirect()->route('pasien.success', $pasien->id)
                        ->with('success', 'Pasien berhasil ditambahkan')
                        ->with('pasien', $pasien);
    }

    public function addSuccess() {
        return view('sukses');
    }
}
