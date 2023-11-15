@extends('layout')

@section('content')

@include('public.navbar')

<!-- Section: Design Block -->
<section class="h-100 d-flex align-items-center justify-content-center">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="text-primary">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card shadow">
            <div class="card-body py-5 px-md-5">
              <form action="/users/auth" method="POST">
                @csrf

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input value="{{old('email')}}" type="email" id="email" name="email" class="form-control" />
                  <label class="form-label" for="email">Email address</label>
                  
                    @error('email')
                        <p class="text-danger text-xs">{{$message}}</p>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control" />
                  <label class="form-label" for="password">Password</label>
                    @error('password')
                        <p class="text-danger text-xs">{{$message}}</p>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" class="w-100 btn btn-primary mb-4">
                    Login
                </button>

                <p>Not a member, register on this link.  <a style="text-decoration: none" href="/register">Register</a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

@endsection