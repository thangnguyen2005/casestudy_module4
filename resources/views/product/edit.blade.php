@extends('admin.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}"><br>
    @error('name')
        <div style="color: red">{{ $message }}</div>
    @enderror

    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" name="slug" value="{{ $product->slug }}"><br>
    @error('slug')
        <div style="color: red">{{ $message }}</div>
    @enderror

    <label for="price" class="form-label">price</label>
    <input type="text" class="form-control" name="price" value="{{ $product->price }}"><br>
    @error('price')
        <div style="color: red">{{ $message }}</div>
    @enderror

    <label for="description" class="form-label">description</label>
    <input type="text" class="form-control" name="description" value="{{ $product->description }}"><br>
    @error('description')
        <div style="color: red">{{ $message }}</div>
    @enderror

    <label for="quantity" class="form-label">quantity</label>
    <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}"><br>
    @error('quantity')
        <div style="color: red">{{ $message }}</div>
    @enderror

    <label for="status" class="form-label">status</label>
    <select name="status" class="form-control">
        <option value="1" {{ $product->status == '1' ? '1' : '' }}>Còn hàng</option>
        <option value="0" {{ $product->status == '0' ? '0' : '' }}>Hết hàng</option>
    </select><br>

    <label for="category_id" class="form-label">category_id</label>
    <select name="category_id" class="form-control">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>

    <label for="image" class="form-label">image</label>
    <input class="form-control" name="image" value="{{ $product->image }}" type="file"><br>

    <input type="submit" class="btn btn-outline-success" value="{{ __('language.confirm') }}">
</form>
@endsection
