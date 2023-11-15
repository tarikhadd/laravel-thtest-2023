@extends('layout')

@section('content')

@auth
<h1 class="mx-3">Hello {{auth()->user()->name}}</h1>
<form action="/logout" method="post">
@csrf
<button class="mx-3 btn btn-primary" type="submit">Logout</button>
</form>


<div class="row m-0 mt-4 align-items-center">

  <div class="col-12 mb-5">
    <div class="card shadow">
      <div class="card-body py-5 px-md-5">
        <form action="/listing" method="POST">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row">
            <div class="col-md-12 mb-4">
              <div class="form-outline">
                <input value="{{old('name')}}" type="text" id="name" name="name" class="form-control" />
                <label class="form-label" for="name">Product name</label>
                  @error('name')
                      <p class="text-danger text-xs">{{$message}}</p>
                  @enderror
              </div>
            </div>
          </div>

          

          <!-- Submit button -->
          <button type="submit" class="w-100 btn btn-primary mb-4">
            Create
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

<div class="row m-0 mt-4">
  @foreach ($listings as $listing)

      <div class="col-4 mb-2">
        <div class="card shadow p-4" style="cursor: pointer">
          <p class="m-0">
            {{$listing['name']}}
          </p><form action="/listings/remove/{{$listing['id']}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-100 btn btn-danger my-4">
              Delete
            </button>
          </form>

          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$listing['id']}}">
            EDIT
          </button>
        </div>
      </div>

      <!-- Modal -->
<div class="modal fade" id="exampleModal{{$listing['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$listing['name']}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/listings/{{$listing['id']}}" method="POST">
          @csrf
          @method('PUT')
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row">
            <div class="col-md-12 mb-4">
              <div class="form-outline">
                <input value="{{$listing['name']}}" type="text" id="name" name="name" class="form-control" />
                <label class="form-label" for="name">Product name</label>
                  @error('name')
                      <p class="text-danger text-xs">{{$message}}</p>
                  @enderror
              </div>
            </div>
          </div>
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
  @endforeach
</div>

<!-- Button trigger modal -->




@else

<h1>Not logged</h1>

<a href="/login">Login</a>



@endauth
@endsection