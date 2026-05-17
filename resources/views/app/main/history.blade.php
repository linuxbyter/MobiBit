<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Bill</title>
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

/* ===== Body Background ===== */
.common_body {
    background-image: url("/public/site/img/user/balance_bg.png");
    background-repeat: no-repeat;
    background-size: 100% 200px;
    min-height: 100vh;
}

/* ===== Transaction Container ===== */
.bill_main {
    margin: 10px 15px;
}
.bill_bg {
    background: none;
}

/* ===== Transaction Records ===== */
.record {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}
.record .item {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    margin-bottom: 5px;
}
.record .label {
    font-weight: 700;
    color: #666666;
}
.record .date {
    font-weight: 400;
    font-size: 12px;
    color: #888888;
}
.record .value.in {
    color: #2BE26C;
    font-weight: 700;
}
.record .value.out {
    color: #FFA559;
    font-weight: 700;
}

/* ===== Scrollbar Hidden ===== */
::-webkit-scrollbar {
    display: none;
}

/* ===== Floating Footer Buttons ===== */
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

/* ===== Mobile Adjustments ===== */
@media screen and (max-width: 480px) {
    .record {
        padding: 10px;
    }
    .record .item {
        font-size: 12px;
    }
    #service a {
        width: 32px;
        height: 32px;
    }
    #service img {
        width: 18px;
        height: 18px;
    }
}
</style>
</head>
<body class="common_body">

<!-- Header -->
<div class="common_header">
    <a href="javascript:history.back(-1)" class="back">
        <i class="layui-icon layui-icon-left"></i>
        History
    </a>
    
</div>

<!-- Transaction List -->
<div class="bill_main">
    <div class="bill_bg" id="Balance_details">

        @php
            use App\Models\UserLedger;
            $transactions = UserLedger::where('user_id', auth()->id())->orderByDesc('id')->get();
        @endphp

        @forelse($transactions as $tx)
        <div class="record">
            <div class="item">
                <p class="label">{{ $tx->reason }}</p>
                <p class="value {{ $tx->amount < 0 ? 'out' : 'in' }}">{{ price($tx->amount) }}</p>
            </div>
            <div class="item">
                <p class="date">{{ $tx->created_at->format('Y-m-d H:i') }}</p>
                <p class="date">{{ $tx->balance_type ?? '' }}</p>
            </div>
        </div>
        @empty
        <div class="record" style="text-align: center;">
            <p style="font-weight: 700; font-size: 16px; color: #888;">No Transactions Found</p>
        </div>
        @endforelse

    </div>
</div>


</body>
</html>
