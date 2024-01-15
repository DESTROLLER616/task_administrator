<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companies() {
        $companies = Company::with('tasks')->get();

        return response()->json($companies);
    }
}
