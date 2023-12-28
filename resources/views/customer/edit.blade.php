@extends('admin.master')

@section('content')
    <form action="{{ route('customer.update', $customer->id) }}" method="post">
        @csrf
        @method('PUT')
        Name: <input type="text" name="name" value="{{ $customer->name }}"><br>
        address: <input type="text" name="address" value="{{ $customer->address }}"><br>
        email: <input type="text" name="email" value="{{ $customer->email }}"><br>
        phone: <input type="text" name="phone" value="{{ $customer->phone }}"><br>
        password: <input type="text" name="password" value="{{ $customer->password }}"><br>
        <input type="submit" value="submit">
    </form>
@endsection
