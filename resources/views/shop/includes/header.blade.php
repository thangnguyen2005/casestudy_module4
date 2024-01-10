<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>

        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">
                        @if (isset(Auth()->guard('customers')->user()->name))
                            {{ Auth()->guard('customers')->user()->name }}
                        @else
                            My Account
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <form action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng Xuất</button>
                            </form>
                        @else
                            <a href="{{ route('customer.login') }}" class="dropdown-item" type="button">Đăng Nhập</a>
                            <a href="{{ route('customer.register') }}" class="dropdown-item" type="button">Đăng Ký</a>
                        @endif
                    </div>
                </div>
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">EUR</button>
                        <button class="dropdown-item" type="button">GBP</button>
                        <button class="dropdown-item" type="button">CAD</button>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">FR</button>
                        <button class="dropdown-item" type="button">AR</button>
                        <button class="dropdown-item" type="button">RU</button>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">LapTop</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">NT</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{route('shop.index')}}" method="GET">
                @csrf
                  <input class="form-control mr-sm-2" id="keywords" type="search" name="tukhoa" placeholder="Tìm kiếm laptop...." aria-label="Search">
                  <div id="search_ajax"></div>
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                   {{--  <input class="switch_color_xam" type="checkbox" id="switch_color" data-on="Đen" data-off="Xám" data-toggle="toggle" data-onstyle="dark" data-offstyle="light" data-style="border"> --}}

                </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
    </div>
</div>

<style>
    .d-inline-flex.align-items-center {
        display: inline-flex;
        align-items: center;
    }

    .btn-group {
        position: relative;
        display: inline-flex;
        vertical-align: middle;
    }

    .btn.btn-sm.btn-light.dropdown-toggle {
        background-color: #fff;
        border: 1px solid #ccc;
        color: #333;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }

    .dropdown-menu.dropdown-menu-right {
        right: 0;
        left: auto;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }
</style>
