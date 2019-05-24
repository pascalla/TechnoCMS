<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subject;
use App\Workshop;

class PageController extends Controller
{
    public function resources(){
      $subjects = Subject::all();
      return view('frontend.subjects')->with('subjects', $subjects);
    }

    public function resource($id){
      $subject = Subject::findOrFail($id);
      return view('frontend.subject')->with('subject', $subject);
    }
}
