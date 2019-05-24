@extends('layouts.frontend')

@section('content')
<section class="pt-5">
  <h1>{{ $subject->name }}</h1>
  <hr>

  <hr>
  <div class="row">
    <div class="col-lg-8 col-12">
      <img src="/{{ $subject->image }}" width="100%" align="right">
      <p>{{ $subject->description }}</p>
    </div>

    <div class="col-lg-4 col-12">

      @foreach($subject->workshops as $workshop)
      <div class="card mt-3">
        <div class="card-header"><b><a href="">{{ $workshop->name }}</a></b></div>
        <div class="card-body">
          <img src="/{{ $workshop->image }}" class="card-img-top" alt="CS-101">
          <p class="card-text">{{ $workshop->description }} </p>
          <ul>
          @foreach($workshop->resources()->get() as $resource)
            <li><a href="/{{ $resource->file }}" target="_blank">{{ $resource->name}}</a></li>
          @endforeach
          </ul>
        </div>
      </div>
      @endforeach
    </div>



  </div>
</section>
@endsection
