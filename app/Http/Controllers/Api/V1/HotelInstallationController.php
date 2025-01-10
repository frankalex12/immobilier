<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\installation;
use Illuminate\Http\Request;

class HotelInstallationController extends Controller
{
    public function store(Request $request,Hotel $hotel)
    {

        return response()->json([$request->installations, $hotel->installations()],200);

    }

    public function update(Request $request,Hotel $hotel, installation $installation)
    {

    }

    public function destroy(Hotel $hotel,installation $installation)
    {

    }
}
