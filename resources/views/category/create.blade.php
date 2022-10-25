@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('Add Category') }}</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('category.store') }}" method="post">
                @csrf

                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="title">{{ __('Category Name') }}</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="description" name="description" class="form-control" />
                    <label class="form-label" for="description">{{ __('Category Description') }}</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">{{ __('Add Category') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection