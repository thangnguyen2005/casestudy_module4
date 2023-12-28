@extends('admin.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="mb-3">
    <h5 class="card-header">{{ __('language.category') }}</h5>
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name" class="form-label">{{ __('language.name_category') }}</label>
            <input type="text" class="form-control" id="name" name="name"> <br>
            @error('name')
                <div style="color: red">{{ __('language.name_ct') }}</div>
            @enderror
            <input type="submit" class="btn btn-outline-success" value="{{ __('language.confirm') }}">
        </form>
    </div>
@endsection
