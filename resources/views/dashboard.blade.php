@extends('layout')

@section('content')




<h1>Not logged</h1>

<a href="/login">Login</a>

<hr>

  @foreach ($listings as $listing)

      <div class="col-4 mb-2">
        <div class="card shadow p-4" style="cursor: pointer">
          <p class="m-0">
            {{$listing['name']}}
         
        </div>
      </div>

      @endforeach



@endsection