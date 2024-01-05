@extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">Đơn đặt hàng</h3>
    </div>

    <hr>
    <td style="text-align: center;">
        <a href="{{ route('xuat') }}" class="btn btn-outline-info">Xuất file excel</a>
    </td>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr class="table-active">

                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Ngày Đặt Hàng</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->customer->email }}</td>
                    <td>{{ $item->customer->phone }}</td>
                    <td>{{ $item->customer->address }}</td>
                    <td>{{ $item->date_at }}</td>

                    <td>
                        <a class="btn btn-outline-info" href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
