@extends('admin.master')

@section('content')
    <div class="form-group">
        <form action="{{ route('customer.store') }}" method="post">
            @csrf
            Name <input type="text" name="name"> <br>
            address <input type="text" name="address"> <br>
            email <input type="text" name="email"> <br>
            phone <input type="text" name="phone"> <br>
            password <input type="text" name="password"> <br>
            <input type="submit" value="submit">
        </form>
    </div>
@endsection
