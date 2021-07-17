<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        return Language::orderBy('name', 'asc')->paginate(20);
    }
}
