<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\State;

class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();

        return response()->json($countries);
    }

    public function states(Country $country)
    {
        return response()->json($country->states);
    }

    public function cities(State $state)
    {
        return response()->json($state->cities);
    }

    public function departments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }
}
