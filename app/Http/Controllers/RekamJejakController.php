<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamJejak;
use Exception;
use Illuminate\Http\Request;

class RekamJejakController extends Controller
{

    private function diagnose($lingkar, $trig, $hdl, $sistolik, $diastolik, $gula, $jenis_kelamin)
    {
        $criteria_met = 0;

        if ($trig >= 150) {
            $criteria_met++;
        }

        if ($sistolik >= 130 || $diastolik >= 85) {
            $criteria_met++;
        }

        if ($gula >= 100) {
            $criteria_met++;
        }

        if ($jenis_kelamin == "PRIA" && $lingkar >= 102) {
            $criteria_met++;
        }

        if ($jenis_kelamin == "WANITA" && $lingkar >= 88) {
            $criteria_met++;
        }

        if ($jenis_kelamin == "PRIA" && $hdl < 40) {
            $criteria_met++;
        }

        if ($jenis_kelamin == "WANITA" && $hdl < 50) {
            $criteria_met++;
        }

        if ($criteria_met >= 3) {
            return true;
        } else return false;
    }

    public function submit(Request $request)
    {
        $rules = ([
            'pasien_id' => 'required',
            'lp' => 'required',
            'trig' => 'required',
            'hdl' => 'required',
            'sistolik' => 'required',
            'diastolik' => 'required',
            'gula' => 'required',
        ]);
        $data = $request->validate($rules);

        $pasien = Pasien::where('id', $data['pasien_id'])->first();

        $diagnosa = $this->diagnose($data['lp'], $data['trig'], $data['hdl'], $data['sistolik'], $data['diastolik'], $data['gula'], $pasien->jenis_kelamin);

        try {
            $rekam = RekamJejak::create([
                'pasien_id' => $data['pasien_id'],
                'lingkar_pinggang' => $data['lp'],
                'trigliserida' => $data['trig'],
                'hdl' => $data['hdl'],
                'sistolik' => $data['sistolik'],
                'diastolik' => $data['diastolik'],
                'gula' => $data['gula'],
                'diagnosa' => $diagnosa,
            ]);

            return redirect()->route('diagnosa.success')->with('success', 'Data berhasil ditambahkan')->with('rekam', $rekam)->with('pasien', $pasien);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $e->getMessage());
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

    public function diagnosaSukses()
    {
        return view('sukses');
    }
}
