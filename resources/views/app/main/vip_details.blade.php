<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Product | {{ env('APP_NAME') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif;}
    body {
      background: #f7f9f7;
      min-height: 100vh;
      padding-bottom: 70px;
    }

    /* ===== Header ===== */
    .page-header {
      background: #255542;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      position: sticky;
      top: 0;
      z-index: 50;
    }
    .page-header a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
    }
    .page-header a i {
      margin-right: 8px;
      font-size: 18px;
    }
    .page-header h1 {
      font-size: 18px;
      font-weight: 600;
    }

    /* ===== Product Image ===== */
    .product-image {
      width: 90%;
      max-width: 400px;
      margin: 20px auto;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    .product-image img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* ===== Small Info Cards ===== */
    .info-section {
      width: 90%;
      max-width: 400px;
      margin: 0 auto;
      background: #fff;
      border-radius: 16px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      margin-bottom: 15px;
    }
    .info-section h2 {
      font-size: 15px;
      font-weight: 600;
      color: #255542;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
      margin-top: 10px;
    }
    .info-item {
      background: #f2f6f2;
      border-radius: 10px;
      padding: 10px;
      text-align: center;
    }
    .info-item p.label {
      font-size: 12px;
      color: #777;
    }
    .info-item p.value {
      font-weight: 600;
      color: #000;
      font-size: 14px;
    }

    /* ===== Total + Button ===== */
    .total-box {
      width: 90%;
      max-width: 400px;
      margin: 10px auto;
      text-align: center;
      font-size: 15px;
      color: #000;
      font-weight: 500;
    }
    .total-box span {
      color: #255542;
      font-weight: 700;
    }
    .buy-btn {
      width: 90%;
      max-width: 400px;
      margin: 15px auto 30px;
      background: #255542;
      color: #fff;
      text-align: center;
      padding: 14px;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }
    .buy-btn:hover {
      background: #1e4737;
    }

    /* ===== Loader ===== */
    .loader {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 999;
    }
  </style>
</head>

<body>
  <!-- ✅ Header -->
  <div class="page-header">
    <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i>Back</a>
    <h1>Buy Product</h1>
    <a href="#"><i class="fa-solid fa-headset"></i></a>
  </div>
  
  @if(session('success'))
  <div style="background:#d4edda;color:#155724;padding:10px;margin:10px;border-radius:8px;">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div style="background:#f8d7da;color:#721c24;padding:10px;margin:10px;border-radius:8px;">
    {{ session('error') }}
  </div>
@endif

  <!-- ✅ Product Image -->
  <div class="product-image">
    <img src="{{ asset($package->photo) }}" alt="{{ $package->name }}">
  </div>

  <!-- ✅ Basic Info -->
  <div class="info-section">
    <h2><i class="fa-solid fa-circle-info"></i> Product Info</h2>
    <div class="info-grid">
      <div class="info-item">
        <p class="label">Price</p>
        <p class="value">{{ setting('currency')}} {{ $package->price }}</p>
      </div>
      <div class="info-item">
        <p class="label">Daily Income</p>
        <p class="value">{{ setting('currency')}} {{ round(($package->commission_with_avg_amount ?? 0) / $package->validity, 2) }}</p>
      </div>
      <div class="info-item">
        <p class="label">Revenue Days</p>
        <p class="value">{{ $package->validity }} Days</p>
      </div>
      <div class="info-item">
        <p class="label">Total Revenue</p>
        <p class="value">{{ setting('currency')}} {{ $package->commission_with_avg_amount }}</p>
      </div>
    </div>
  </div>

  <!-- ✅ Monthly Fund Details -->
  <div class="info-section">
    <h2><i class="fa-solid fa-sack-dollar"></i> Monthly Fund</h2>
    <p style="font-size: 13px; color: #333; line-height: 22px; margin-top: 5px;">
      The investment amount of this product starts from <b>{{ setting('currency')}} {{ $package->price }}</b>.<br>
      Duration: <b>{{ $package->validity }} days</b><br>
      Total Income: <b>{{ setting('currency')}} {{ $package->commission_with_avg_amount }}</b>
    </p>
  </div>

  <!-- ✅ Total Money -->
  <div class="total-box">
    Total Money: <span>{{ setting('currency')}} {{ $package->price }}</span>
  </div>

  <!-- ✅ Buy Button -->
  <div class="buy-btn" onclick="buyConfirm()">Buy Now</div>

  <!-- ✅ Loader -->
  <div class="loader">
    <img src="{{ asset('public/load-removebg-preview.png') }}" width="80" alt="Loading">
  </div>

  <script>
    function buyConfirm() {
      document.querySelector('.loader').style.display = 'block';
      window.location.href = '{{ url('purchase/confirmation/'.$package->id) }}';
    }
  </script>
</body>
</html>
