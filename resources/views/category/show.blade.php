@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach($classifields as $classifield)
                <div class="col-md-12">
                    <div class="card my-3">
                        <div class="card-header"><strong>{{ $classifield->title }}</strong></div>
                        <div class="card-body">
                            <p class="card-text">{{ $classifield->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection