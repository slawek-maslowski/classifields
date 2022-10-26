@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('Edit Classifield') }} {{ $classifield->title }}</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('classifield.update', $classifield->id) }}" method="post">
                @csrf

                <select class="form-select mb-4" aria-label="Default select example" name="category_id">
                    @foreach(\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>

                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" value="{{ $classifield->title }}" class="form-control" />
                    <label class="form-label" for="title">{{ __('Classifield Name') }}</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="description" name="description" value="{{ $classifield->description }}" class="form-control" />
                    <label class="form-label" for="description">{{ __('Classifield Description') }}</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">{{ __('Change') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection