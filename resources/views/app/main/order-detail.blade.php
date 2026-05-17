<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Order Details</title>
    <link rel="stylesheet" href="/public/site/layui/css/layui.css">
    <link rel="stylesheet" href="/public/site/css/common.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .details_card {
            background: #fff;
            border-radius: 12px;
            padding: 16px;
            margin: 20px auto;
            max-width: 420px; /* keeps content compact */
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .details_title {
            font-size: 18px;
            font-weight: 600;
            color: #222;
            margin-bottom: 12px;
            text-align: center;
        }
        .details_row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .details_row:last-child { border-bottom: none; }
        .label { color: #666; }
        .value { font-weight: 500; color: #333; }
        .common_header {
            padding: 12px;
            background: #fff;
            border-bottom: 1px solid #eee;
        }
        .common_header a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .common_header .btn i {
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="common_header">
   <a href="/orders" class="back position">
      <p class="btn"><i class="layui-icon layui-icon-left"></i></p>
      Back to Orders
   </a>
</div>

@php
    $daysPassed = \Carbon\Carbon::parse($purchase->created_at)->diffInDays(now());
    $dailyIncome = $purchase->daily_income ?? 0;
    $earnedIncome = $dailyIncome * $daysPassed;
    $estimatedIncome = $dailyIncome * ($purchase->package->validity ?? 0);
@endphp

<div class="details_card">
    <p class="details_title">Order #{{ $purchase->id }}</p>

    <div class="details_row">
        <span class="label">Product:</span>
        <span class="value">{{ $purchase->package->name ?? 'Unknown Package' }}</span>
    </div>

    <div class="details_row">
        <span class="label">Quantity:</span>
        <span class="value">{{ $purchase->share ?? '1' }}</span>
    </div>

    <div class="details_row">
        <span class="label">Daily Income:</span>
        <span class="value">{{ price($dailyIncome) }}</span>
    </div>

    <div class="details_row">
        <span class="label">Earned So Far:</span>
        <span class="value">{{ price($earnedIncome) }}</span>
    </div>

    <div class="details_row">
        <span class="label">Total Income (Est.):</span>
        <span class="value">{{ price($estimatedIncome) }}</span>
    </div>

    <div class="details_row">
        <span class="label">Order Date:</span>
        <span class="value">{{ $purchase->created_at->format('Y-m-d') }}</span>
    </div>

    <div class="details_row">
        <span class="label">Status:</span>
        <span class="value" style="color:{{ $purchase->status == 'active' ? 'green' : 'red' }};">
            {{ ucfirst($purchase->status) }}
        </span>
    </div>
</div>

</body>
</html>
