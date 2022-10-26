@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center align-items-center">
                <h1>{{ __('Classifields') }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('categories')
<div class="container">
    <div class="row">

        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">{{ $category->title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">{{ __('Enter') }}</a>
                    </div>
                    @can('isAdmin')
                        <div class="card-footer text-muted">
                            <button type="button" class="btn btn-secondary btn-floating" onclick="window.location='{{ route('category.edit', ['category' => $category->id]) }}';">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>

                            <form action="{{ route('category.delete', $category->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-floating">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection