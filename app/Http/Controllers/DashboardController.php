<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pasien = Pasien::paginate(10);

        return view('admin.dashboard', compact('pasien'));
    }
}
