<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller //OEFEN SCHOOL
{
    public function show()
    {
        $company = 'Hogeschool Rotterdam';
        return view('about-us', [
            'company' => $company
        ]);
    }
}
