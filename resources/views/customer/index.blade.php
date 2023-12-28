@extends('admin.master')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('customer.search') }}" method="GET">
                    <td>
                        <input type="text" name="keyword" placeholder="Search">
                        <button type="submit">Search</button>
                    </td>
                </form>
                    <a href="/customer/create" class="btn btn-primary">Thêm</a> <br>
                    <a href="/category" >Bảng category</a> <br>
                    <a href="/product" >Bảng product</a> <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">


                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>address</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>password</th>
                            <th>hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->password }}</td>
                                <td>
                                    <form action="/customer/{{ $customer->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/customer/{{ $customer->id }}/edit" class="btn btn-primary">Sửa</a>
                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $customers->links('pagination::bootstrap-4') }}
@endsection
