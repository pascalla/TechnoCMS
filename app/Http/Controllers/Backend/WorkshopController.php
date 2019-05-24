<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;

use App\Subject;
use App\Workshop;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $subject = Subject::findOrFail($id);
      return view('backend.workshop.create')->with('subject', $subject);
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
        'description_en' => 'required|max:512',
        'name_cy' => 'required|max:128',
        'description_cy' => 'required|max:512',
        'subject_id' => 'required|numeric',
        'image' => 'required|image',
        'order' => 'numeric'
      ]);

      $workshopData = [
       'image' =>  Storage::putFile('subjects', $request->file('image')),
       'subject_id' => $request->subject_id,
       'en'  => ['name' => $request->name_en, 'description' => $request->description_en],
       'cy'  => ['name' => $request->name_cy, 'description' => $request->description_cy],
      ];

      $workshop = Workshop::create($workshopData);

      // redirect user with a message in session
      Session::flash('success', 'Successfully created Workshop');
      return redirect()->route('subjects.show', $request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subject_id, $workshop_id)
    {

      $workshop = Workshop::findOrFail($workshop_id);
      $resources = $workshop->resources()->get();
      return view('backend.workshop.show')->with('workshop', $workshop)->with('resources', $resources);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
