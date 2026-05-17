<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | {{ env('APP_NAME') }}</title>

  <!-- LayUI + Font Awesome -->
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

    /* ===== Top Background ===== */
    .top-bg {
      width: 100%;
      height: 280px;
      background: url('maxoimp/image1.webp') no-repeat center top / cover;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;
    }

   .register-container {
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

    /* ===== OTP Row ===== */
    .otp-row {
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
      width: 100%;
      max-width: 380px;
    }

    .otp-row input {
      flex: 1;
      height: 52px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 16px;
      padding-left: 20px;
      outline: none;
    }

    .otp-row .send-btn {
      background: #255542;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0 20px;
      height: 52px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .otp-row .send-btn:hover {
      background: #255542;
    }

    /* ===== Register Button ===== */
    .register-btn {
      width: 100%;
      max-width: 380px;
      height: 52px;
      background: #255542;
      border: none;
      border-radius: 30px;
      font-size: 17px;
      color: white;
      font-weight: 600;
      margin-top: 15px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-btn:hover {
      background: #255542;
    }

    .login-link {
      margin-top: 22px;
      font-size: 14px;
      color: #333;
    }

    .login-link a {
      color: #255542;
      font-weight: 600;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      .register-container {
        padding: 80px 20px 50px;
        height: calc(100% - 180px);
      }
    }
  </style>
</head>

<body>
  <div class="top-bg"></div>

  <div class="register-container">
    <div class="logo">
      <img src="maxoimp/starbucks-logo-png_seeklogo-354127.png" alt="Logo">
    </div>

    <h2>Create Account</h2>

    <form action="{{ url('register') }}" method="POST" class="layui-form" id="registerForm">
      @csrf

      <div class="input-group">
        <span>+254</span>
        <input type="text" name="phone" lay-verify="required" placeholder="Enter phone number" autocomplete="off">
      </div>

      <div class="input-group">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="nickname" lay-verify="required" placeholder="Enter nickname" autocomplete="off">
      </div>

      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="password" lay-verify="required" placeholder="Enter password" autocomplete="off">
      </div>

      <div class="input-group">
        <i class="fa-solid fa-user-plus"></i>
        <input type="text" name="ref_by" value="{{ $ref_by ?? rand(100000,999999) }}" lay-verify="required" placeholder="Invitation code" autocomplete="off">
      </div>

      <div class="otp-row">
        <input type="text" name="code" id="code" lay-verify="required" placeholder="Enter OTP" autocomplete="off">
        <button type="button" id="getCode" class="send-btn">Send</button>
      </div>

      <button type="submit" class="register-btn" lay-submit lay-filter="register">Register Now</button>

      <div class="login-link">
        Already have an account? <a href="/login">Login</a>
      </div>
    </form>
  </div>

  @include('alert-message')

  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    layui.use(['form', 'layer'], function(){
      var form = layui.form;
      var layer = layui.layer;

      // Fake OTP sender
      $('#getCode').on('click', function(){
        const phone = $('input[name="phone"]').val();
        if (!phone) {
          layer.msg('Please enter your phone number');
          return;
        }

        layer.msg('Sending OTP...');
        setTimeout(() => {
          const otp = Math.floor(100000 + Math.random() * 900000);
          $('#code').val(otp);
          layer.msg('OTP sent successfully!');
        }, 800);
      });

      // Form submit
      form.on('submit(register)', function(){
        layer.load(2, {shade:[0.3,'#000']});
        return true;
      });
    });
  </script>
</body>
</html>
