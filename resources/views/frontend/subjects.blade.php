@extends('layouts.frontend')

@section('content')
<section class="pt-5">
  <h1>{{ __("resources.title")}}</h1>
  <hr>
    <img src="https://www.technocamps.com/themes/technocamps/assets/img/Resources-CTA.png" width="20%" align="right">
    <p>{{ __("resources.description")}}</p>

    <p>{{ __("resources.leveldescription")}}</p>
  </br>
  <hr>
  <div class="row">
    @foreach($subjects as $subject)
    <div class="col-lg-4 col-12">
      <div class="card mt-3">

        <div class="card-header"><b><a href="{{ route('frontend.resource', $subject->id) }}">{{ $subject->name }}</a></b></div>
        <div class="card-body">
          <img src="/{{ $subject->image }}" class="card-img-top" alt="CS-101">
          <p class="card-text">{{ $subject->description }} </p>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
@endsection
