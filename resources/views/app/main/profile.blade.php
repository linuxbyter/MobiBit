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
      height: 150px;
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


  </style>
</head>

<body>
  <div class="top-bg"></div>

  <div class="profile-card">
  <div class="logo-circle">
    <img src="maxoimp/starbucks-logo-png_seeklogo-354127.png" alt="Logo">
  </div>

  <!-- ===== New Info Cards ===== -->
  <div class="info-cards" style="display: flex; justify-content: space-between; margin-top: 10px; gap: 8px;">
    <div class="info-box" style="flex:1; background:#f0f0f0; border-radius:10px; padding:10px; text-align:center;">
      <p style="margin:0; font-weight:600; font-size:14px; color:#000;">{{ auth()->user()->phone }}</p>
      <small style="color:#666; font-size:12px;">Phone</small>
    </div>
    <div class="info-box" style="flex:1; background:#f0f0f0; border-radius:10px; padding:10px; text-align:center;">
      <p style="margin:0; font-weight:600; font-size:14px; color:#000;">{{ auth()->user()->id }}</p>
      <small style="color:#666; font-size:12px;">User ID</small>
    </div>
  </div>

  <!-- ===== Stats ===== -->
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

<!-- Service Links Section -->
<div class="service-links">
  <a href="/add-bank" class="service-link">
    <div>
      <i class="fa-solid fa-credit-card"></i>
      <span>Bank Card</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>

  <a href="/orders" class="service-link">
    <div>
      <i class="fa-solid fa-box"></i>
      <span>Order History</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>

  <a href="/balanceDetails" class="service-link">
    <div>
      <i class="fa-solid fa-box"></i>
      <span>Fund  History</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>
  <a href="/get-bonus" class="service-link">
    <div>
      <i class="fa-solid fa-gift"></i>
      <span>Gift Code</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>

  <a href="/tasks" class="service-link">
    <div>
      <i class="fa-solid fa-list-check"></i>
      <span>Task</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>

  <a href="{{ setting('channel')}}" class="service-link">
    <div>
      <i class="fa-solid fa-headset"></i>
      <span>Support</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>

  <a href="/logout" class="service-link">
    <div>
      <i class="fa-solid fa-right-to-bracket"></i>
      <span>Logout</span>
    </div>
    <i class="fa-solid fa-chevron-right"></i>
  </a>
</div>
<br>
<br>
<br>

<!-- CSS -->
<style>
.service-links {
    width: 90%;
    max-width: 400px;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.service-link {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 16px;
    border-radius: 12px;
    background: #255542;
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
    font-family: "Poppins", sans-serif;
}

.service-link div {
    display: flex;
    align-items: center;
    gap: 12px;
}

.service-link i {
    font-size: 18px;
    color: #fff;
}

.service-link span {
    font-size: 15px;
    font-weight: 600;
}

.service-link > i.fa-chevron-right {
    font-size: 16px;
    color: #fff;
}

.service-link:hover {
    background: #2e6b58;
}
</style>
<!-- ✅ Modern Footer Menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="bottom_menu">
  <a href="/home" class="menu_item " onclick="setActiveMenu(this)">
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

  <a href="/my" class="menu_item active" onclick="setActiveMenu(this)">
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

