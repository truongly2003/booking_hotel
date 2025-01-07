<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LocationController extends Controller
{
    public function show()
    {
        $location=Location::all();
        return response()->json($location);
    }
}
