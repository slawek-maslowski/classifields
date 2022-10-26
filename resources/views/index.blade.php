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
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Category Name') }}</th>
                        <th>{{ __('Category Description') }}</th>
                        @can('isadmin')
                        <th>{{ __('Action') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            @can('isAdmin')
                            <td>
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

                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection