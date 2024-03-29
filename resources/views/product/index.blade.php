@extends('admin.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary" style="text-align: center">{{ __('language.product') }}</h3>
    </div>
    <hr>

    <div class="wrapper">
        <nav>   
            <div class="input-group">
                <div class="form-outline" data-mdb-input-init>
                    <form action="{{ route('product.search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="{{ __('language.seach') }}"
                            value="{{ old('keyword') }}">
                    </form>
                </div>
            </div>
        </nav>
        <nav>
            <a href="/product/create" class="btn btn-outline-primary">{{ __('language.add_new') }}</a>
        </nav>

    </div>

    <div class="card">
        <h5 class="card-header">{{ __('language.product') }}</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('language.name_Product') }}</th>
                        <th>{{ __('language.slug') }}</th>
                        <th>{{ __('language.price') }}</th>
                        <th>{{ __('language.description') }}</th>
                        <th>{{ __('language.quantity') }}</th>
                        <th>{{ __('language.status') }}</th>
                        <th>{{ __('language.category') }}</th>
                        <th>{{ __('language.image') }}</th>
                        <th>{{ __('language.your_actions') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ Str::limit($product->description, 10) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                @if ($product->quantity == 0)
                                    Hết hàng
                                @else
                                    Còn hàng
                                @endif
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <img style="width:50% ; height: 50%"
                                    src="{{ asset('admin/uploads/product/' . $product->image) }}" alt="">
                            </td>
                            <td>
                                @if (Auth::user()->hasPermission('Product_delete'))
                                    <form action="{{ route('product.softdeletes', $product->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button
                                            onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không ?');"
                                            class="btn btn-outline-danger">{{ __('language.delete') }}</button>
                                @endif
                                </form>
                                @if (Auth::user()->hasPermission('Product_update'))
                                    <a href="{{ route('product.edit', [$product->id]) }}"
                                        class="btn btn-outline-info">{{ __('language.update') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- {{ $products->links('pagination::bootstrap-4') }} --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        });
    </script>
@endsection

<style>
    .wrapper nav {
        display: inline-block;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .input-group input::placeholder {
        color: #6c757d;
    }

    .input-group input:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .nav-item.dropdown {
        display: inline-block;
        position: relative;
    }

    .nav-item.dropdown .changeLang {
        padding: 8px 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background-color: #fff;
        font-size: 14px;
        color: #212529;
        cursor: pointer;
    }

    .nav-item.dropdown .changeLang:focus {
        outline: none;
    }

    .nav-item.dropdown .changeLang option {
        background-color: #fff;
        color: #212529;
    }
</style>
