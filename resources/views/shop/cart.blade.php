
@extends('shop.master')
@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if (session('cart'))
            @foreach (session('cart') as $id => $details)
                @php
                    $total += $details['price'] * $details['quantity'];
                    $maxQuantity = 100; // Số lượng tối đa cho mỗi sản phẩm
                    $availableQuantity = 0; // Số lượng sản phẩm hiện có trong cơ sở dữ liệu

                    // Lấy số lượng sản phẩm hiện có từ cơ sở dữ liệu (giả sử có một bảng "products" chứa thông tin sản phẩm)
                    $product = \App\Models\Product::find($id);
                    if ($product) {
                        $availableQuantity = $product->quantity;
                    }
                @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('admin/uploads/product/' . $details['image']) }}" width="100"
                                    height="80" class="img-responsive" />
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ number_format($details['price']) }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}"
                            class="form-control quantity update-cart" min="1" max="{{ min($maxQuantity, $availableQuantity) }}" />
                    </td>
                    <td data-th="Subtotal" class="text-center">
                        ${{ number_format($details['price'] * $details['quantity']) }}
                    </td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart">
                            <i class="fa fa-trash-o"></i>Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total ${{ number_format($total) }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/shop') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a>
                <a class="btn btn-success" href="{{url('/shop/checkout')}}">Checkout</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
