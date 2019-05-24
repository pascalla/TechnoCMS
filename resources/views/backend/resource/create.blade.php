@extends('layouts.backend')

@section('content')
<section class="subjects pt-5">
  <h1>Add New Resource for {{ $workshop->name }}</h1>
  <hr>
  @include('partials._messages')
  <div class="row">
    <div class="col-lg-12 col-12">
      <div class="card">
        <div class="card-body">
          {{ Form::open(['action' => ['ResourceController@store'], 'files' => true]) }}

            <div class="form-group">
              {{ Form::label('file', 'File:')}}
              {{ Form::file('file') }}
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="en-tab" data-toggle="tab" href="#en-details" role="tab" aria-controls="en-details" aria-selected="true">English</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="cy-tab" data-toggle="tab" href="#cy-details" role="tab" aria-controls="cy-details" aria-selected="false">Welsh</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade pt-2 show active" id="en-details" role="tabpanel" aria-labelledby="en-tab">
                <div class="form-group">
                  {{ Form::label('name_en', 'Name:')}}
                  {{ Form::text('name_en', old('name_en'), array('class' => 'form-control')) }}
                </div>
              </div>

              <div class="tab-pane pt-2 fade" id="cy-details" role="tabpanel" aria-labelledby="cy-tab">
                <div class="form-group">
                  {{ Form::label('name_cy', 'Name:')}}
                  {{ Form::text('name_cy', old('name_cy'), array('class' => 'form-control')) }}
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
            {{ Form::hidden('workshop_id', $workshop->id)}}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
