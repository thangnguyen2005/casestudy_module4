<style>
    /* CSS cho phần form */
    .form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .input-form {
        margin-bottom: 15px;
    }

    .input-form span {
        display: block;
        margin-bottom: 5px;
    }

    .input-form input[type="text"],
    .input-form input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .input-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .nho-dang-nhap {
        margin-bottom: 15px;
    }

    /* CSS cho phần thông báo lỗi */
    .error-message {
        color: red;
        margin-top: 5px;
    }

    /* CSS cho phần liên kết đăng ký */
    .register-link {
        text-align: center;
        margin-top: 10px;
    }

    .register-link a {
        color: #4CAF50;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>

<section>
    <div class="noi-dung">
        <div class="form">
            <h2>Trang Đăng Nhập</h2>
            <form method="POST" action="{{ route('customer.checkLogin') }}">
                @csrf

                <div class="input-form">
                    <span>Email</span>
                    <input type="text" name="email">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-form">
                    <span>Password</span>
                    <input type="password" name="password">
                    @error('password')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <div class="nho-dang-nhap">
                    <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                </div>
                <div class="input-form">
                    <input type="submit" value="Đăng Nhập">
                </div>
            </form>
            <div class="register-link">
                <p>Bạn Chưa Có Tài Khoản? <a href="{{ route('customer.register') }}">Đăng Ký</a></p>
            </div>
        </div>
    </div>
    <!-- Kết Thúc Phần Nội Dung -->
</section>
