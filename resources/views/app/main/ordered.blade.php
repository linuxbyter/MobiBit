<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Product</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f5f5f5;
}

/* ===== Header ===== */
.common_header {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #255542;
    color: #fff;
    position: sticky;
    top: 0;
    z-index: 1000;
}
.common_header .back {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
    margin-right: 10px;
}
.common_header .back i {
    font-size: 20px;
    margin-right: 5px;
}
.common_header p {
    margin: 0;
}

/* ===== Balance Card ===== */
.bill_main {
    margin: 15px;
}
.bill_bg {
    background: #255542;
    border-radius: 12px;
    padding: 15px;
    color: #fff;
    text-align: center;
    font-weight: 600;
    font-size: 16px;
}

/* ===== Orders ===== */
.common_main {
    margin: 10px 15px 30px 15px;
}
.product_details_card {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 15px;
    position: relative;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.product_details_name {
    font-weight: 700;
    font-size: 18px;
    color: #333;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.vip_btn {
    padding: 2px 8px;
    font-size: 12px;
    border-radius: 10px;
    background: #255542;
    color: #fff;
    display: inline-flex;
    align-items: center;
    gap: 3px;
}
.product_details_status {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 14px;
    padding: 2px 8px;
    border-radius: 4px;
    color: #FFA320;
    background: #FFF8E8;
    text-align: center;
}
.product_details_status_finish {
    color: #fff;
    background: #255542;
}

/* Order Params */
.order_param_content {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
    background: #255542;
    padding: 10px;
    border-radius: 8px;
}
.param_value {
    font-weight: 700;
    font-size: 16px;
    text-align: center;
    color: #fff;
}
.param_price {
    color: #FC9400;
}
.param_label {
    font-size: 12px;
    color: #fff;
    text-align: center;
    margin-top: 2px;
}

/* Footer / Order Details button */
.order_footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}
.order_time {
    font-size: 13px;
    color: #666;
}
.order_details {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 50px;
    border: 1px solid #DADBDA;
    color: #488A31;
    font-size: 14px;
    text-align: center;
    text-decoration: none;
}

/* Empty State */
.empty_state {
    text-align: center;
    margin-top: 30px;
}
.empty_state img {
    width: 160px;
}
.empty_state p {
    margin-top: 15px;
    font-weight: 700;
    font-size: 18px;
    color: #888;
}

/* Floating Footer / Service Buttons */
#service {
    position: fixed;
    right: 15px;
    bottom: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 999;
}
#service a {
    width: 36px;
    height: 36px;
    background: #FFF0DA;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
#service img {
    width: 20px;
    height: 20px;
}
</style>
</head>
<body>

<!-- Header -->
<div class="common_header">
    <a href="javascript:history.back(-1)" class="back">
        <i class="layui-icon layui-icon-left"></i>
        Products Details
    </a>
    
</div>

<!-- Balance -->
<div class="bill_main">
    <div class="bill_bg">
        Balance: {{price(auth()->user()->balance)}}
    </div>
</div>

<!-- Orders -->
<div class="common_main">
    <div id="order_list">

        @php
            use Carbon\Carbon;
            use App\Models\Purchase;

            $purchases = Purchase::where('user_id', auth()->id())
                ->with('package')
                ->orderByDesc('id')
                ->get();
        @endphp

        @forelse($purchases as $purchase)
            @php
                $package = $purchase->package;
                $daysPassed = \Carbon\Carbon::parse($purchase->created_at)->diffInDays(now());
                $dailyIncome = $purchase->daily_income ?? 0;
                $totalIncome = $dailyIncome * $daysPassed;
                $status = $purchase->status === 'completed' ? 'finish' : 'normal';
            @endphp
            <div class="product_details_card">
                <div class="product_details_name">
                    {{ $package->name }}
                    <div class="vip_btn">{{ $package->validity }} Days</div>
                </div>
                <div class="product_details_status {{ $status === 'finish' ? 'product_details_status_finish' : '' }}">
                    {{ ucfirst($status) }}
                </div>

                <div class="order_param_content">
                    <div>
                        <p class="param_value">{{ $purchase->share ?? '1' }}</p>
                        <p class="param_label">Quantity</p>
                    </div>
                    <div>
                        <p class="param_value param_price">{{ price($dailyIncome) }}</p>
                        <p class="param_label">Daily Income</p>
                    </div>
                    <div>
                        <p class="param_value">{{ $package->commission_with_avg_amount }}</p>
                        <p class="param_label">Total Income</p>
                    </div>
                </div>

                <div class="order_footer">
                    <p class="order_time">{{ $purchase->created_at->format('Y-m-d') }}</p>
                    <a href="{{ url('/orders/' . $purchase->id) }}" class="order_details">Details</a>
                </div>
            </div>
        @empty
            <div class="empty_state">
                <img src="/public/site/img/order/no_orders.png" alt="No Orders">
                <p>No Orders Found</p>
            </div>
        @endforelse

    </div>
</div>



</body>
</html>
