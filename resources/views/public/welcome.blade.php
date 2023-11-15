@extends('layout')

@section('content')

@include('public.navbar') 

<div class="row m-0 mt-4">
  @foreach ($listings as $listing)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card w-100 shadow my-3" style="width: 18rem;">
          <img src="https://stimg.cardekho.com/images/carexteriorimages/930x620/BMW/5-Series-2024/10182/1685002609273/front-left-side-47.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$listing['name']}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
      </div>
    </div>
  @endforeach
</div>

<a href="/login">Login</a>
@endsection