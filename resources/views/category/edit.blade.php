@extends('admin.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="{{ route('category.update', $categories->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name" class="form-label">{{ __('language.name_category') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $categories->name }}"><br>
    @error('name')
            <div style="color: red">{{ __('language.name_ct') }}</div>
        @enderror
    <input type="submit" class="btn btn-outline-success" value="{{ __('language.confirm') }}">
</form>
@endsection
