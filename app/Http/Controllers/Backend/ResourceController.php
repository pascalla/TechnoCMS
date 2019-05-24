<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;

use App\Workshop;
use App\Resource;

class ResourceController extends Controller
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
    public function create($subject_id, $workshop_id)
    {
        $workshop = Workshop::findOrFail($workshop_id);
        return view('backend.resource.create')->with('workshop', $workshop);
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
        'name_cy' => 'required|max:128',
        'workshop_id' => 'required|numeric',
        'file' => 'required',
      ]);

      $resourceData = [
       'file' =>  Storage::putFile('subjects/resources', $request->file('file')),
       'workshop_id' => $request->workshop_id,
       'en'  => ['name' => $request->name_en],
       'cy'  => ['name' => $request->name_cy],
      ];

      $resource = Resource::create($resourceData);
      $workshop = Workshop::findOrFail($request->workshop_id);

      // redirect user with a message in session
      Session::flash('success', 'Successfully created Resource');
      return redirect()->route('workshops.show', [$workshop->subject()->id, $workshop->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
