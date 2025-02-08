<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamJejak;
use Exception;
use Illuminate\Http\Request;

class RekamJejakController extends Controller
{

    private function diagnose($lingkar, $trig, $hdl, $sistolik, $diastolik, $gula){
        //Not Implemented

        return "true";
    }

    public function submit(Request $request)
    {
        $rules = ([
            'pasien_id'=>'required',
            'lp'=>'required',
            'trig'=>'required',
            'hdl'=>'required',
            'sistolik'=>'required',
            'diastolik'=>'required',
            'gula'=>'required',
        ]);
        $data = $request->validate($rules);

        $diagnosa = $this->diagnose($data['lp'], $data['trig'], $data['hdl'], $data['sistolik'], $data['diastolik'], $data['gula']);

        try {
            $rekam = RekamJejak::create([
                'pasien_id' => $data['pasien_id'],
                'lingkar_pinggang' => $data['lp'],
                'trigliserida'=> $data['trig'],
                'hdl'=>$data['hdl'],
                'sistolik'=>$data['sistolik'],
                'diastolik'=>$data['diastolik'],
                'gula'=>$data['gula'],
                'diagnosa'=>$diagnosa,
            ]);

            return redirect()->route('diagnosa.success')->with('success','Data berhasil ditambahkan')->with('rekam', $rekam);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$e->getMessage());
        }
    }

    public function diagnosaPasien(Request $request)
    {
        // GET NIK from request
        $nik = $request->validate([
            'nik' => 'required'
        ]);
        $pasien = Pasien::where('nik', $nik)->first();

        if ($pasien) {
            return view('diagnosis', [
                'pasien' => $pasien
            ]);
        }

        // Return if patient is not found
        return redirect()->back()->with('error', 'Pasien tidak ditemukan');
    }

    public function diagnosaSukses(){
        return view('sukses');
    }
}
