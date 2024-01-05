<!DOCTYPE html>
<html>
<head>
  <title>Trang Đăng Nhập</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    section {
      position: relative;
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f2f2f2;
    }

    section .noi-dung {
      width: 400px;
      padding: 40px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    section .noi-dung h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    section .noi-dung form input[type="text"],
    section .noi-dung form input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    section .noi-dung form input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    section .noi-dung form input[type="submit"]:hover {
      background-color: #45a049;
    }

    section .noi-dung .nho-dang-nhap {
      margin-bottom: 15px;
    }

    .error-message {
      color: red;
      margin-top: 5px;
    }

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
</head>
<body>
  <section>
    <!-- Bắt Đầu Phần Nội Dung -->
    <div class="noi-dung">
      <div class="form">
        <h2>Trang Đăng Nhập</h2>
        <form method="POST" action="{{ route('customer.checkLogin') }}">
          @csrf

          <div class="input-form">
            <span>Email</span>
            <input type="text" name="email" class="form-control">
            @error('email')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-form">
            <span>Password</span>
            <input type="password" name="password" class="form-control">
            @error('password')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="nho-dang-nhap">
            <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
          </div>

          <div class="input-form">
            <input type="submit" value="Đăng Nhập" class="btn btn-primary">
          </div>
        </form>
        <div class="register-link">
          <p>Bạn Chưa Có Tài Khoản? <a href="{{ route('customer.register') }}">Đăng Ký</a></p>
          <p>Đăng nhập bằng google <a href="{{ url('auth/google') }}">google</a></p>
        </div>
      </div>
    </div>
    <!-- Kết Thúc Phần Nội Dung -->
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</HTML>
