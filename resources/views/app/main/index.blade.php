<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | {{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #f8f8f8;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      overflow-x: hidden;
    }

    /* ===== Top Background ===== */
    .top-bg {
      width: 100%;
      height: 240px;
      background: url('maxoimp/image1.webp') no-repeat center / cover;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
      position: relative;
    }

    /* ===== Profile Card ===== */
    .profile-card {
      position: relative;
      background: #fff;
      border-radius: 15px;
      width: 90%;
      max-width: 400px;
      margin-top: -60px;
      padding: 55px 20px 20px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .logo-circle {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: #fff;
      overflow: hidden;
      border: 4px solid #fff;
      position: absolute;
      top: -35px;
      left: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo-circle img {
      width: 90%;
      height: auto;
    }

    .phone-number {
      position: absolute;
      top: 15px;
      left: 110px;
      font-weight: 600;
      font-size: 16px;
      color: #000;
    }

    /* ===== Stats ===== */
    .stats {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
      gap: 8px;
    }

    .stat-box {
      flex: 1;
      background: #fff;
      border-radius: 10px;
      padding: 10px 0;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .stat-box p {
      font-weight: 600;
      font-size: 15px;
      margin-bottom: 2px;
      color: #000;
    }

    .stat-box small {
      color: #666;
      font-size: 12px;
    }

    /* ===== Action Buttons ===== */
    .action-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      width: 90%;
      max-width: 400px;
      gap: 10px;
    }

    .action-item {
      flex: 1;
      background: #fff;
      border-radius: 8px;
      padding: 12px 8px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
    }

    .action-item i {
      color: #255542;
      font-size: 22px;
      margin-bottom: 5px;
    }

    .action-item span {
      display: block;
      color: #255542;
      font-weight: 600;
      font-size: 13px;
    }

    /* ===== Tabs (Fixed at Top) ===== */
    .index_menu {
      position: sticky;
      top: 0;
      z-index: 50;
      display: flex;
      justify-content: space-between;
      background: #fff;
      margin-top: 15px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
      width: 90%;
      max-width: 400px;

    }

    .index_menu .nav {
      flex: 1;
      text-align: center;
      padding: 10px 0;
      cursor: pointer;
      transition: 0.3s;
    }

    .index_menu .nav img {
      display: block;
      margin: 0 auto 5px;
      width: 36px;
      height: 36px;
            color: #fff;

    }

    .index_menu .nav p.title {
      font-size: 13px;
      font-weight: 500;
      color: #555;
    }

    .index_menu .nav_active {
      background: #255542;
            color: #fff;

    }

    .index_menu .nav_active p.title {
      color: #fff;
    }

    .index_menu .nav_active img {
      filter: brightness(100);
    }

    /* ===== Product Cards ===== */
    .index_main {
      margin: 20px auto;
      width: 90%;
      max-width: 500px;
    }

    .product_card {
      display: block;
      position: relative;
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 20px;
      text-decoration: none;
      color: #333;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
      transition: 0.3s;
    }

    .product_card:hover {
      transform: translateY(-3px);
    }

    .product_card .buy {
      position: absolute;
      right: 20px;
      top: 20px;
      background: #255542;
      color: #fff;
      font-size: 13px;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 8px;
    }

    .product_title {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .product_image {
      width: 70px;
      height: 70px;
      border-radius: 10px;
      object-fit: cover;
    }

    .product_name {
      font-weight: 600;
      font-size: 15px;
      margin-bottom: 6px;
      display: flex;
      align-items: center;
    }

    .product_price {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .product_price .label {
      font-size: 13px;
      color: #777;
    }

    .product_price .value {
      font-weight: 600;
      color: #255542;
      font-size: 14px;
    }

    .flex_space {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
    }

    .product_item {
      text-align: center;
      flex: 1;
    }

    .product_item p.label {
      font-size: 12px;
      color: #888;
    }

    .product_item p.value {
      font-weight: 600;
      color: #333;
      font-size: 14px;
    }

    .none_data {
      text-align: center;
      padding: 40px 0;
      color: #888;
    }

    .none_image {
      width: 120px;
      opacity: 0.6;
    }

    .none_text {
      margin-top: 10px;
    }

    .product_list {
      display: none;
    }

    .product_list.active {
      display: block;
    }

    @media (max-width: 480px) {
      .profile-card {
        width: 94%;
      }

      .index_menu {
        width: 94%;
      }

      .product_card {
        width: 100%;
        margin: 0 auto 20px;
      }
    }
    .flex_space {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 15px;
}

.product_item {
  flex: 1;
  background: #f9f9f9;
  border-radius: 10px;
  padding: 10px 0;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  text-align: center;
}

.product_item p.label {
  font-size: 12px;
  color: #777;
  margin-bottom: 4px;
}

.product_item p.value {
  font-weight: 600;
  color: #255542;
  font-size: 14px;
}

  </style>
</head>

<body>
  <div class="top-bg"></div>

  <div class="profile-card">
    <div class="logo-circle">
      <img src="maxoimp/starbucks-logo-png_seeklogo-354127.png" alt="Logo">
    </div>
    <div class="phone-number">+254 | {{ auth()->user()->phone }}</div>

    <div class="stats">
      <div class="stat-box">
        <p>{{ price(auth()->user()->balance + auth()->user()->income) }}</p>
        <small>Balance</small>
      </div>
      <div class="stat-box">
        <p>{{ price(auth()->user()->income) }}</p>
        <small>Recharge</small>
      </div>
      <div class="stat-box">
        <p>{{ price(auth()->user()->balance) }}</p>
        <small>Total Income</small>
      </div>
    </div>
  </div>

  <div class="action-row">
    <a href="/recharge" class="action-item">
      <i class="fa-solid fa-dollar-sign"></i>
      <span>Recharge</span>
    </a>
    <a href="/withdraw" class="action-item">
      <i class="fa-solid fa-building-columns"></i>
      <span>Withdraw</span>
    </a>
    <a href="/about" class="action-item">
      <i class="fa-solid fa-money-bill-transfer"></i>
      <span>Get Loan</span>
    </a>
    <a href="{{ setting('channel')}}" class="action-item">
      <i class="fa-solid fa-headset"></i>
      <span>Online</span>
    </a>
  </div>

  <?php
  use App\Models\Package;
  $packages = Package::where('status', 'active')->get();
  ?>

 <!-- Font Awesome (make sure it's loaded in your <head>) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="index_menu">
  <div class="nav nav_active" data-type="1" onclick="setActiveTab(1)">
    <i class="fa-solid fa-piggy-bank"></i>
    <p class="title">Fixed Fund</p>
  </div>

  <div class="nav" data-type="2" onclick="setActiveTab(2)">
    <i class="fa-solid fa-coins"></i>
    <p class="title">Welfare Fund</p>
  </div>

  <div class="nav" data-type="3" onclick="setActiveTab(3)">
    <i class="fa-solid fa-gift"></i>
    <p class="title">Yearly Fund</p>
  </div>
</div>




  <div class="index_main">
    <!-- FIXED FUND -->
    <div class="product_type_1 product_list active" id="fixed_fund">
      @foreach ($packages as $package)
        @if ($package->category == 'fixed')
          <a href="{{ route('vip.details', $package->id) }}" class="product_card">
            <div class="buy">Buy Now</div>
            <div class="product_content">
              <div class="product_title">
                <img class="product_image" src="{{ asset($package->photo) }}">
                <div>
                  <div class="product_name">
                    <img src="/public/site/img/vip/lv{{ $package->vip_level ?? 0 }}.png" style="width: 18px; height: 18px; margin-right: 5px;">
                    {{ $package->name }}
                  </div>
                  <div class="product_price">
                    <p class="label">Price</p>
                    <p class="value">{{ setting('currency')}} {{ $package->price }}</p>
                  </div>
                </div>
              </div>
              <div class="flex_space">
                <div class="product_item">
                  <p class="label">Revenue</p>
                  <p class="value">{{ $package->validity }} Days</p>
                </div>
                <div class="product_item">
                  <p class="label">Daily Earnings</p>
                  <p class="value">{{ setting('currency')}} {{ ($package->commission_with_avg_amount / $package->validity) }}</p>
                </div>
                <div class="product_item">
                  <p class="label">Total Revenue</p>
                  <p class="value">{{ setting('currency')}} {{ $package->commission_with_avg_amount }}</p>
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>

    <!-- WELFARE FUND -->
    <div class="product_type_2 product_list" id="welfare_fund">
      @foreach ($packages as $package)
        @if ($package->category == 'welfare')
          <a href="{{ route('vip.details', $package->id) }}" class="product_card">
            <div class="buy">Buy Now</div>
            <div class="product_content">
              <div class="product_title">
                <img class="product_image" src="{{ asset($package->photo) }}">
                <div>
                  <div class="product_name">
                    <img src="/public/site/img/vip/lv{{ $package->vip_level ?? 0 }}.png" style="width: 18px; height: 18px; margin-right: 5px;">
                    {{ $package->name }}
                  </div>
                  <div class="product_price">
                    <p class="label">Price</p>
                    <p class="value">{{ setting('currency')}} {{ $package->price }}</p>
                  </div>
                </div>
              </div>
              <div class="flex_space">
                <div class="product_item">
                  <p class="label">Revenue</p>
                  <p class="value">{{ $package->validity }} Days</p>
                </div>
                <div class="product_item">
                  <p class="label">Daily Earnings</p>
                  <p class="value">{{ setting('currency')}} {{ ($package->commission_with_avg_amount / $package->validity) }}</p>
                </div>
                <div class="product_item">
                  <p class="label">Total Revenue</p>
                  <p class="value">{{ setting('currency')}} {{ $package->commission_with_avg_amount }}</p>
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>

    <!-- ACTIVITY FUND -->
    <div class="product_type_3 product_list" id="activity_fund">
      @foreach ($packages as $package)
        @if ($package->category == 'activity')
          <a href="{{ route('vip.details', $package->id) }}" class="product_card">
            <div class="buy">Buy Now</div>
            <div class="product_content">
              <div class="product_title">
                <img class="product_image" src="{{ asset($package->photo) }}">
                <div>
                  <div class="product_name">
                    <img src="/public/site/img/vip/lv{{ $package->vip_level ?? 0 }}.png" style="width: 18px; height: 18px; margin-right: 5px;">
                    {{ $package->name }}
                  </div>
                  <div class="product_price">
                    <p class="label">Price</p>
                    <p class="value">{{ setting('currency')}}{{ $package->price }}</p>
                  </div>
                </div>
              </div>
              <div class="flex_space">
                <div class="product_item">
                  <p class="label">Revenue</p>
                  <p class="value">{{ $package->validity }} Days</p>
                </div>
                <div class="product_item">
                  <p class="label">Daily Earnings</p>
                  <p class="value">{{ setting('currency')}} {{ ($package->commission_with_avg_amount / $package->validity) }}</p>
                </div>
                <div class="product_item">
                  <p class="label">Total Revenue</p>
                  <p class="value">{{ setting('currency')}} {{ $package->commission_with_avg_amount }}</p>
                </div>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>
  </div>
  <br>
  <br>

<!-- ✅ Modern Footer Menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="bottom_menu">
  <a href="/home" class="menu_item active" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-house"></i>
    <span>Home</span>
  </a>

  <a href="/team" class="menu_item" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-users"></i>
    <span>Team</span>
  </a>

  <a href="/blog" class="menu_item" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-blog"></i>
    <span>Blog</span>
  </a>

  <a href="/my" class="menu_item" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-user"></i>
    <span>Mine</span>
  </a>
</div>

<style>
.bottom_menu {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(135deg, #255542, #3b755b);
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 8px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  z-index: 999;
}

.bottom_menu .menu_item {
  color: #e0e0e0;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 12px;
  cursor: pointer;
  transition: 0.3s ease;
  position: relative;
  padding: 6px 12px;
  border-radius: 10px;
  text-decoration: none;
}

.bottom_menu .menu_item i {
  font-size: 18px;
  margin-bottom: 3px;
}

.bottom_menu .menu_item.active {
  color: #fff;
  background: rgba(0, 230, 118, 0.2);
  box-shadow: 0 0 10px rgba(0, 230, 118, 0.3);
  transform: translateY(-3px);
}

.bottom_menu .menu_item.active i {
  color: #00e676;
}

.bottom_menu .menu_item:hover {
  color: #fff;
}
</style>

<script>
function setActiveMenu(el) {
  document.querySelectorAll('.bottom_menu .menu_item').forEach(item => {
    item.classList.remove('active');
  });
  el.classList.add('active');
}
</script>


  <script>
    function setActiveTab(type) {
      document.querySelectorAll('.nav').forEach(nav => nav.classList.remove('nav_active'));
      document.querySelector('.nav[data-type="' + type + '"]').classList.add('nav_active');
      document.querySelectorAll('.product_list').forEach(list => list.classList.remove('active'));
      if (type === 1) document.getElementById('fixed_fund').classList.add('active');
      if (type === 2) document.getElementById('welfare_fund').classList.add('active');
      if (type === 3) document.getElementById('activity_fund').classList.add('active');
    }
  </script>
</body>
</html>
