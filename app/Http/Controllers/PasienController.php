<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamJejak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    public function new(Request $request)
    {
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

    public function addSuccess()
    {
        return view('sukses');
    }

    public function show(Pasien $pasien)
    {
        $riwayat = RekamJejak::where('pasien_id', $pasien->id)->get();
        return view('admin.pasien.view', compact(['pasien', 'riwayat']));
    }

    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:pasiens,id', // Pastikan ID valid
            'nama' => 'required',
            'kelamin' => 'required',
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('pasiens', 'nik')->ignore($request->id)
            ]
        ];

        $data = $request->validate($rules);

        $pasien = Pasien::findOrFail($request->id);
        $pasien->update([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['kelamin'],
            'nik' => $data['nik']
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Data pasien berhasil diperbarui');
    }
}
