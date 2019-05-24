<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;

use App\Subject;
use App\Workshop;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subjects = Subject::all()->sortBy('order');
      return view('backend/subject/index')->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/subject/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Perform validation on request
      $request->validate([
        'name_en' => 'required|max:128',
        'description_en' => 'required|max:8096',
        'name_cy' => 'required|max:128',
        'description_cy' => 'required|max:8096',
        'image' => 'required|image',
        'level' => 'required|numeric',
        'order' => 'numeric'
      ]);

      $subjectData = [
       'image' =>  Storage::putFile('subjects', $request->file('image')),
       'level' => $request->level,
       'en'  => ['name' => $request->name_en, 'description' => $request->description_en],
       'cy'  => ['name' => $request->name_cy, 'description' => $request->description_cy],
      ];

      $subject = Subject::create($subjectData);

      // redirect user with a message in session
      Session::flash('success', 'Successfully created Subject');
      return redirect()->route('subjects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('backend.subject.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Perform validation on request
      $request->validate([
        'name' => 'required|max:128',
        'description' => 'required|max:512',
        'image' => 'image',
        'order' => 'numeric'
      ]);

      // create new model
      $subject = Subject::findOrFail($id);
      $subject->name = $request->name;
      $subject->description = $request->description;

      // if image is present update
      if($request->image){
        // store file and return path
        $subject->image = Storage::putFile('subjects', $request->file('image'));
      }


      // save to database
      $subject->save();

      // redirect user with a message in session
      Session::flash('success', 'Successfully deleted Subject');
      return Redirect::to('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        // redirect user with a message in session
        Session::flash('success', 'Successfully deleted Subject');
        return Redirect::to('subject.index');
    }
}
