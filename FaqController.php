<?php

namespace App\Http\Controllers;

use App\Models\Extra\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function getFaq(Request $request){
        $questions = Faq::all()->toArray();
        return View('faq')->with(['questions' => $questions]);
    }
}
