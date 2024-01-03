<style>
    /* CSS cho phần form */
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f7f7f7;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container p {
        text-align: center;
        margin-bottom: 20px;
    }

    .container label {
        display: block;
        margin-bottom: 10px;
    }

    .container input[type="text"],
    .container input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .container hr {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .container .registerbtn {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .container .registerbtn:hover {
        background-color: #45a049;
    }

    .container p.signin {
        text-align: center;
        margin-top: 10px;
    }

    .container p.signin a {
        color: #4CAF50;
    }

    .container p.signin a:hover {
        text-decoration: underline;
    }
</style>

<form action="{{ route('customer.checkRegister') }}" method="POST">
    @csrf

    <div class="container">
        <h1>Trang Đăng Ký</h1>

        <label for="name"><b>Name</b></label>
        <input type="text" name="name" id="name">

        <label for="address"><b>Address</b></label>
        <input type="text" name="address" id="address">

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" id="email">

        <label for="phone"><b>Phone</b></label>
        <input type="text" name="phone" id="phone">

        <label for="psw"><b>Password</b></label>
        <input type="password" name="psw" id="psw">

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" name="psw_repeat" id="psw-repeat">

        <button type="submit" class="registerbtn">Đăng Ký</button>

        <p class="signin">Bạn Đã Có Tài Khoản? <a href="{{route('customer.login')}}">Đăng nhập</a>.</p>
    </div>
</form>
