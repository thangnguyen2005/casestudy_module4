@extends('admin.master')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="card-header py-3">
    <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">Chi tiết đơn hàng</h3>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">GIá(Đồng)</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền($)</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach ($items as $key => $item)
        @php $total += $item->total @endphp
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $item->product_name }}</td>
                <td>{{ number_format($item->product_price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->date_at }}</td>
                <td>{{ number_format($item->total) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Tổng Tiền của đơn hàng: {{number_format($total)}} $</p>
<a  class="btn btn-outline-danger" href="{{ route('order.index') }}">Quay lại</a>
@endsection

