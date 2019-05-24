@extends('layouts.backend')

@section('content')
<section class="subjects pt-5">
  <h1>{{ $subject->name }} Workshops <a href="{{ route('workshops.create', [$subject->id]) }}"><button class="btn btn-primary float-lg-right">Add New Workshop</button></a></h1>
  {{ $subject->description }}
  <hr>
  <div class="row">

    @foreach($subject->workshops()->get() as $workshop)
    <div class="col-lg-4 col-12 h-100">
      <div class="card">
        <img src="/{{ $workshop->image }}" class="card-img-top" alt="{{ $workshop->name }}">
        <div class="card-body">
          <h5 class="card-title">{{ $workshop->name }}</h5>
          <p class="card-text">{{ $workshop->description }}</p>
          <a href="{{ route('workshops.show', ['subject_id' => $subject->id, 'workshop_id' => $workshop->id])}}" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
@endsection
