<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Layui + Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * { box-sizing: border-box; }
     html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: "Poppins", sans-serif;
  overflow-x: hidden; /* 👈 Prevent horizontal scroll */
  overflow-y: auto;   /* 👈 Allow vertical scroll */
}


    .top-bg {  width: 100%;
      height: 280px;
      background: url('maxoimp/image1.webp') no-repeat center top / cover;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;}

    .login-container {
     position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 0;
  background: #fff;
  border-radius: 20px 20px 0 0;
  padding: 100px 30px 70px;
  box-shadow: 0 -6px 30px rgba(0, 0, 0, 0.2);
  text-align: center;
  height: calc(100% - 200px);
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
}

     /* ===== Logo Circle ===== */
    .logo {
      width: 100px;
      height: 100px;
      background: #fff;
      border-radius: 50%;
      overflow: hidden;
      border: 5px solid #fff;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
      position: absolute;
      top: -50px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo img {
      width: 120%;
      height: auto;
    }

    h2 {
      margin-top: 20px;
      font-weight: 600;
      color: #333;
      margin-bottom: 25px;
    }

    /* ===== Input Groups ===== */
    .input-group {
      position: relative;
      width: 100%;
      max-width: 380px;
      margin: 0 auto 22px;
    }

    .input-group input {
      width: 100%;
      height: 52px;
      padding-left: 70px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 16px;
      outline: none;
      transition: 0.3s;
    }

    .input-group input:focus {
      border-color: #255542;
    }

    .input-group span {
      position: absolute;
      top: 50%;
      left: 20px;
      transform: translateY(-50%);
      font-size: 15px;
      color: #333;
      font-weight: 500;
    }

    .input-group span::after {
      content: "|";
      margin-left: 5px;
      color: #999;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 20px;
      transform: translateY(-50%);
      color: #255542;
      font-size: 17px;
    }
    .login-btn { width:100%; max-width:380px; height:52px; background:#255542; border:none; border-radius:30px; font-size:17px; color:white; font-weight:600; margin-top:10px; cursor:pointer; transition:0.3s; }
    .login-btn:hover { background:#255542; }
    .register { margin-top:22px; font-size:14px; color:#333; }
    .register a { color:#255542; font-weight:600; text-decoration:none; }

    @media (max-width:480px) {
      .login-container { padding:80px 20px 50px; height:calc(100% - 180px); }
      .input-group input { font-size:15px; height:48px; }
    }
  </style>
</head>

<body>
  <div class="top-bg"></div>

  <div class="login-container">
    <div class="logo">
      <img src="maxoimp/starbucks-logo-png_seeklogo-354127.png" alt="Logo">
    </div>

    <h2>StarBucks</h2>

    <!-- Note: lay-filter on form helps Layui render properly -->
    <form action="{{ url('login') }}" method="POST" class="layui-form" id="loginForm" lay-filter="loginForm">
      @csrf

      <!-- Phone Input -->
      <div class="input-group">
        <span>+254</span>
        <input type="text" name="phone" lay-verify="required|phone" placeholder="Enter phone number" autocomplete="off">
      </div>

      <!-- Password Input -->
      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="password" lay-verify="required" placeholder="Enter password" autocomplete="off">
      </div>

      <!-- Keep same attributes on button -->
      <button type="submit" class="layui-btn login-btn" lay-submit lay-filter="login-submit">Login</button>

      <div class="register">
        Don’t have an account? <a href="/register">Sign Up</a>
      </div>
    </form>
  </div>

 @include('alert-message')

  <!-- ✅ JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
  layui.use(['form', 'layer'], function () {
    var form = layui.form;
    var layer = layui.layer;

    // ✅ Layui form submit event
    form.on('submit(login)', function (data) {
      var formData = data.field;
      var index = layer.load(2, {shade: [0.3, '#000']}); // ⏳ Show loading

      $.ajax({
        url: '/login',
        method: 'POST',
        data: formData,
        headers: {
          'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        /*success: function (res) {
          layer.close(index); // ✅ Close loading
          layer.msg(res.msg || 'Logging in...');

          if (res.status == 1) {
            setTimeout(function () {
              window.location.href = "/";
            }, 1500);
          }*/
        },
        error: function () {
          layer.close(index);
          layer.msg('Login failed. Please try again.');
        }
      });

      return false; // prevent default form submission
    });
  });
  </script>
</body>
</html>
