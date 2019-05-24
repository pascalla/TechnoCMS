@extends('layouts.backend')

@section('content')
<section class="subjects pt-5">
  <h1>{{ $workshop->name }} Resources
    <a href="{{ route('resources.create', ['subject_id' => $workshop->subject()->id, 'workshop_id' => $workshop->id])}}">
      <button class="btn btn-primary float-lg-right">Add New Resource</button>
    </a>
  </h1>
  {{ $workshop->description }}
  <hr>
  <div class="row">

    @foreach($resources as $resource)
    <div class="col-lg-4 col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="/{{ $resource->file }}" target="_blank">{{ $resource->name }}</a></h5>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
@endsection
