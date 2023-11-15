@extends('layout')

@section('content')

@include('public.navbar')

<div class="container">

    <h2 class="my-5">List of public test apis for CRUD:</h2>

    <div class="accordion" id="accordionExample">
        @foreach ($publicApiList as $key=>$api)
            <div class="accordion-item">
                <h2 class="accordion-header" id="p_label{{$key}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#p_id{{$key}}" aria-expanded="false" aria-controls="p_{{$key}}">
                        {{$api[0]}}
                    </button>
                </h2>
                <div id="p_id{{$key}}" class="accordion-collapse collapse" aria-labelledby="p_label{{$key}}">
                    <div class="accordion-body">
                        <p>{{$api[1]}}</p>

                        @if (count($api) > 2)

                        <p>
                            Example payload:
                        </p>
                        <p>
                            {{$api[count($api) - 1]}}
                        </p>
                            
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br>

    <h2 class="my-5">Auth apis:</h2>
    <p><strong>NOTE</strong>: CRUD Api-s below depend on token, so you need to implement auth first, log in and then use them, also you'll get here only listings that logged user created.</p>


    <div class="accordion" id="accordionExample">
        @foreach ($authApiList as $key=>$api)
            <div class="accordion-item">
                <h2 class="accordion-header" id="api_label{{$key}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#api_id{{$key}}" aria-expanded="false" aria-controls="api_{{$key}}">
                        {{$api[0]}}
                    </button>
                </h2>
                <div id="api_id{{$key}}" class="accordion-collapse collapse" aria-labelledby="api_label{{$key}}">
                    <div class="accordion-body">
                        <p>{{$api[1]}}</p>

                        @if (count($api) > 2)

                        <p>
                            Example payload:
                        </p>
                        <p>
                            {{$api[count($api) - 1]}}
                        </p>
                            
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="my-5">List of test apis:</h2>

    <div class="accordion" id="accordionExample">
        @foreach ($apiList as $key=>$api)
            <div class="accordion-item">
                <h2 class="accordion-header" id="label{{$key}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#id{{$key}}" aria-expanded="false" aria-controls="{{$key}}">
                        {{$api[0]}}
                    </button>
                </h2>
                <div id="id{{$key}}" class="accordion-collapse collapse" aria-labelledby="label{{$key}}">
                    <div class="accordion-body">
                        <p>{{$api[1]}}</p>

                        @if (count($api) > 2)

                        <p>
                            Example payload:
                        </p>
                        <p>
                            {{$api[count($api) - 1]}}
                        </p>
                            
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        
</div>

@endsection