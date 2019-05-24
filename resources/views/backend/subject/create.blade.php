@extends('layouts.backend')

@section('content')
<section class="subjects pt-5">
  <h1>Add New Subject</h1>
  <hr>
  @include('partials._messages')
  <div class="row">
    <div class="col-lg-12 col-12">
      <div class="card">
        <div class="card-body">
          {{ Form::open(['action' => ['SubjectController@store'], 'files' => true]) }}

            <div class="form-group">
              {{ Form::label('image', 'Image:')}}
              {{ Form::file('image') }}
            </div>

            <div class="form-group">
              {{ Form::label('level', 'Level:')}}
              {{ Form::text('level', old('level'), array('class' => 'form-control')) }}
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
                <div class="form-group">
                  {{ Form::label('synopsis-en', 'Synopsis:')}}
                  {{ Form::text('synopsis_en', old('synopsis_en'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('description_en', 'Description:')}}
                  {{ Form::text('description_en', old('description_en'), array('class' => 'form-control')) }}
                </div>
              </div>

              <div class="tab-pane pt-2 fade" id="cy-details" role="tabpanel" aria-labelledby="cy-tab">
                <div class="form-group">
                  {{ Form::label('name_cy', 'Name:')}}
                  {{ Form::text('name_cy', old('name_cy'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('synopsis_cy', 'Synopsis:')}}
                  {{ Form::text('synopsis_cy', old('synopsis_cy'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('description_cy', 'Description:')}}
                  {{ Form::text('description_cy', old('description_cy'), array('class' => 'form-control')) }}
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
