@extends('shop.master')
@section('content')
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Categories</span></h2>
                <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width:45%; height: 100px;">
                            <img class="img-fluid"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAADFCAMAAACsN9QzAAAAeFBMVEX///8AAADq6ura2trv7+/8/PycnJz4+PhYWFimpqbPz8+QkJB2dnYRERHd3d3n5+cJCQm3t7e+vr6Hh4eAgIAkJCTV1dVJSUnMzMyVlZUtLS3ExMQfHx9ubm5PT08yMjJmZmYZGRlBQUE5OTlnZ2ejo6MiIiJzc3P+oxJqAAAEsklEQVR4nO3abXuqIBwGcCxJ7UHSzEzX09a27/8ND9RpQeL8U3Jde3H/3pyOOvRGQiAZAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+MOisI3f9o366QXYz3DfH/1sIhQ86ihuUDwMLComa4Bn8dK28wFbaZ+55RTRff/nZUO6qgnlBsFOHSyKui4E47aSh3C0nXkqdzRvpItcsBk9f6L+OyeVK83l0WXQcJ5fb4gPmfXMMv+WeJFmfhszv/iixlf5eRDu4qMIl5Gf/NbWr/JPqBfpmD9ckOOr/FnBlmy6ZrPMS3x76w+CsiRfpGP+PT2+yr/NWFBsJixfDZ+dd7V+mf/gKX/uEF/lnyRskdYhSz595I+6+vdZx/aX828c84s3FrCmZofUR/5d15lPnvIXLvEv/f/qXMqHwLnw0f87NcZB8tO/Vrf8bLKO4/Vk+PCdfb8rl/xu1PiHMy5EZC33NZxN82Y6FhfpWErHqfw3vXx2wPLZJMvzpiqFsI7S+PhaujPhIfY9fiNrePlWH97j3WqmalikInzmW3a7/6f1m+1b6m3k+hqj7/9WW64jvtNhL+tjkuRlmVqro7Wtt/3HhSzwM2tK2UK6a5hbP/oh74neFS8uXzD7kK/enIvVNsmraTqyX7DD9/863FoeNse5LFR+bappmbbnedx3m+GsCrT7n1+yaPm7pyhf6tJnSdZU41uv5JD/s/sBsN7sd/Pi0vI8POtbFXDSTn2+btPyV52XqXtPIlVxDvmzhFTwaRJ57jaMgUjYyl92DYwfLFXLcRr/02b+wbLx2gkY9zf7fyot/5RRJ+krp/ufsDGx3MtSgR+yd1lrJ9rfthv5u8fGD7aO8/8ptQK8tQCz7w9+enUjPyevAJTaSkl/fs7EO7HgpwYjFMYtuE8sH/KzEW22stf+rj+/ktFqoPAUn+sPoY97KzPb/+XKq9U5/uhbsdGWNGj5GUuT7+Nm3S7K5GPYz4z+KgjG9+2t/Pf2F4myavJkW8y/97/14LT82qMtTGXB2WRWzC310XgIz7ixtDXT9rTvf6dIpNYlEuv433L/O8n6uC/Jbd2SEen3r9Z3OORXbcO2kmc91CW/mu/+HD18B8AfWr+R0yk/Y7alrNJ2oDaWojzU79X1TYnkhJvjj7nRXrX8We9svbQ+HNaWobv+tJn1lptWsdf8eus/RbwjP4V97XQTP6A+7S08rHkbv+rk5j7H/P4Nv+qX6sUfH3rrZ/OfyUcuT04FW3uTlxjT78fx5bP5Q3Kq2Gn5fzF4fCNhqy9+Mv+R0Sb1UuPUGQz+k4/QS9/8Xjt0cv7UO5K92jOX9f962PmfLMyo/fbi8nP588eK7RY55R+1M7yW38hn6Vufyp8xNUuh/Fx8Eswl/+CLgEbf/2FZX3si//v4fzlh3HfoTr3BQM5/jIZe/eAfevljyxHUNz5uFkd9gjbd/fJix7pQJ+TGqmu3urBd3osiob1ZJWyVG4rON7GsVMP/KUd9+PVFLvVCFaedgfn/BWTw8nsKdFzN/ps/mQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgPQPumU79FNZoQUAAAAASUVORK5CYII="
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Asus</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width:35%; height: 100px;">
                            <img class="img-fluid"
                                src="data:image/jpeg;base64,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"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Apple</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width:35%; height: 100px;">
                            <img class="img-fluid"
                                src="data:image/png;base64,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"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Dell</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width:50%; height: 100px;">
                            <img class="img-fluid"
                                src="data:image/png;base64,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"
                                alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Acer</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured
            Products</span></h2>
            <div class="row px-xl-5" id="items_container">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img style="width:200px ; height: 165px ; border-radius:0%"
                                src="{{ asset('admin/uploads/product/' . $product->image) }}" alt="">
                            <div class="product-action">
                                @if ($product->quantity > 0)
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @else
                                    <a class="btn btn-outline-dark btn-square disabled"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @endif
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square"
                                    href="{{ route('detail', ['id' => $product->id]) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">
                                Số lượng:
                                @if ($product->quantity <= 0)
                                    <del><span class="text-danger">{{ $product->quantity }}</span></del>
                                @else
                                    <span class="{{ $product->quantity <= 0 ? 'text-danger' : '' }}">{{ $product->quantity }}</span>
                                @endif
                            </a><br>
                            <a class="h6 text-decoration-none text-truncate" href="">
                                @if ($product->quantity <= 0)
                                    <span class="text-danger"><del>Hết hàng</del></span>
                                @else
                                    <span class="text-success">Còn hàng</span>
                                @endif
                            </a><br>
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->price) }}</h5>
                                <h6 class="text-muted ml-2"><del>{{ number_format($product->price) }}</del></h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="text-center">
                <button id="load_more_button" data-page="{{ $products->currentPage() + 1 }}"
                    class="btn btn-primary">Load More</button>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $('#keywords').keyup(function(){
            var query = $(this).val();
              if(query != '')
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{url('/autocomplete-ajax')}}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){
                   $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                  }
                 });
                }else{
                  $('#search_ajax').fadeOut();
                }
            });
            $(document).on('click', '.li_search_ajax', function(){
    var productName = $(this).text();
    var productImage = $(this).find('img').attr('src');
    $('#keywords').val(productName);
    $('#search_ajax').fadeOut();
    // Hiển thị hình ảnh sản phẩm (productImage) theo nhu cầu của bạn
});
        </script>
@endsection
