@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach($classifields as $classifield)
                <div class="col-md-12">
                    <div class="card my-3">
                        <div class="card-header">
                            {{ __('Category') }} {{ $classifield->category->title }} | {{ __('Classifield Name') }}: <strong>{{ $classifield->title }}</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $classifield->description }}</p>
                        </div>
                    </div>
                    <div class="mt-n4 pr-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary btn-floating" onclick="window.location='{{ route('classifield.edit', ['classifield' => $classifield->id]) }}';">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>

                        <form action="{{ route('classifield.delete', $classifield->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-floating">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection