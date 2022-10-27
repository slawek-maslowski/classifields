@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('Add Classifield') }}</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('classifield.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <select class="form-select mb-4" aria-label="Default select example" name="category_id">
                    @foreach(\App\Models\Category::all() as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>

                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="title">{{ __('Classifield Name') }}</label>
                </div>

                <div class="form-outline mb-4">
                    <textarea type="text" id="description" name="description" class="form-control" rows="5" /></textarea>
                    <label class="form-label" for="description">{{ __('Classifield Description') }}</label>
                </div>

                <label class="form-label" for="attachment">{{ __('Choose file') }}</label>
                <input type="file" class="form-control mb-4" id="attachment" name="attachment" />

                <button type="submit" class="btn btn-primary btn-block">{{ __('Add Classifield') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection