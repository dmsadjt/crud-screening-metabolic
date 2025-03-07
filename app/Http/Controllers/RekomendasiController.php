<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function getByDiagnosis($id)
    {
        $recommendations = Rekomendasi::where('diagnosis_id', $id)
            ->get()
            ->groupBy('category');

        if ($recommendations->isEmpty()) {
            return response()->json(['message' => 'No recommendations available for this diagnosis.']);
        }

        return response()->json($recommendations);
    }
}
