@extends('layouts.backend')

@section('content')
<section class="subjects pt-5">
  <h1>Subjects <a href="{{ route('subjects.create') }}"><button class="btn btn-primary float-lg-right">Add New Subject</button></a></h1>
  <hr>
  <div class="row">
    @foreach($subjects as $subject)
    <div class="col-lg-4 col-12">
      <div class="card mt-3">
        <img src="/{{ $subject->image }}" class="card-img-top" alt="CS-101">
        <div class="card-body">
          <h5 class="card-title">{{ $subject->name }}</h5>
          <p class="card-text">{{ $subject->description }} </p>
          <a href="{{ route('subjects.show', [$subject->id]) }}" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</section>
@endsection
