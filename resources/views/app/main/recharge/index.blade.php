<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{ env('APP_NAME') }}_Recharge</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
/* ===== Body ===== */
body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    background: #f0f2f5;
}

/* ===== Header ===== */
.header_fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #255542;
    color: #fff;
    padding: 15px;
    font-size: 18px;
    font-weight: 600;
    display: flex;
    align-items: center;
    z-index: 999;
}

.header_fixed .back_btn {
    font-size: 20px;
    cursor: pointer;
    margin-right: 10px;
}

/* ===== Account Balance Card ===== */
.balance_card_new {
    background: #255542;
    border-radius: 12px;
    padding: 20px 15px;
    text-align: center;
    width: 85%;
    max-width: 300px;
    margin: 90px auto 20px auto; /* space for header */
    color: #fff;
    transition: transform 0.3s ease;
}

.balance_card_new:hover {
    transform: translateY(-4px);
}

.balance_card_new i {
    font-size: 28px;
    display: block;
    margin-bottom: 10px;
}

.balance_card_new .balance_amount {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 4px;
}

.balance_card_new .balance_label {
    font-size: 12px;
    letter-spacing: 0.5px;
    opacity: 0.85;
}

/* ===== Recharge Form ===== */
.recharge_card {
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    margin: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.recharge_card h3 {
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 600;
}

.layui-input {
    height: 44px;
    line-height: 44px;
    border-radius: 8px;
    border: 1px solid #DCDCDC;
    padding: 0 12px;
    background: #FAFAFA;
}

/* ===== Quick Amount Buttons ===== */
.quick {
    background: #fff;
    border: 2px solid #fff;
    border-radius: 20%;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    margin: 5px auto;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #2E7D32;
    font-weight: 600;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.quick_active {
    background: #255542;
    border: 2px solid #255542;
    color: #fff;
    transform: scale(1.1);
}

/* ===== Deposit Button ===== */
.fixed_submit button,
.recharge_card button {
    width: 100%;
    background: #255542;
    color: #fff;
    font-weight: 700;
    height: 50px;
    font-size: 16px;
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* ===== Instructions ===== */
.instructions_card {
    background: #fff;
    border-radius: 16px;
    padding: 15px 20px;
    margin: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    font-size: 13px;
    color: #333;
    line-height: 1.5;
}
.instructions_card p {
    margin: 8px 0;
}

/* ===== Payment Methods ===== */
.payment_methods label {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #F0F0F0;
    border-radius: 8px;
}

/* ===== Mobile adjustments ===== */
@media screen and (max-width: 480px) {
    .balance_card_new {
        padding: 15px 10px;
    }
    .balance_card_new i {
        font-size: 24px;
    }
    .balance_card_new .balance_amount {
        font-size: 20px;
    }
    .balance_card_new .balance_label {
        font-size: 11px;
    }
    .quick {
        width: 60px;
        height: 60px;
        line-height: 60px;
        font-size: 14px;
    }
}

/* ===== Overlay ===== */
#loadingOverlay {
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    color:#fff;
    font-size:20px;
    display:flex;
    justify-content:center;
    align-items:center;
    z-index: 9999;
    display:none;
}
</style>
</head>
<body>

<!-- Header -->
<div class="header_fixed">
    <i class="layui-icon layui-icon-left back_btn" onclick="history.back()"></i>
    <span>Recharge</span>
</div>

<!-- Account Balance Card -->
<div class="balance_card_new">
    <i class="layui-icon layui-icon-rmb"></i>
    <div class="balance_amount">{{price(auth()->user()->balance)}}</div>
    <div class="balance_label">Account Balance</div>
</div>

<!-- Recharge Card -->
<div class="recharge_card">
    <form id="rechargeForm" onsubmit="goPayment(event)">
        <h3>Deposit Amount</h3>
        <div class="layui-form-item">
            <input type="number" name="amount" id="deposit_amount" placeholder="Enter deposit amount" class="layui-input">
        </div>

        <h3>Quick Amount</h3>
        <div class="layui-row layui-col-space10">
            @foreach([500,1500,3000,5000,8000,15000,30000,50000] as $value)
            <div class="layui-col-xs3 layui-col-md3">
                <div class="quick {{ $loop->first ? 'quick_active' : '' }}" onclick="getAmount(this, {{ $value }})">
                    {{ $value }}
                </div>
            </div>
            @endforeach
        </div>

        <!-- Separator -->
        <hr style="border:none; border-top:1px solid #DDD; margin:15px 0;">

        <h3>Payment Methods</h3>
        <div class="payment_methods">
            @foreach(\App\Models\PaymentMethod::get() as $el)
            <label>
                <span style="flex:1;">{{ $el->name }}</span>
                <input type="radio" name="payment_method" value="{{ $el->id }}" {{ $loop->first ? 'checked' : '' }}>
            </label>
            @endforeach
        </div>

        <!-- Deposit Now Button -->
        <div style="margin-top:20px;">
            <button type="submit" class="layui-btn layui-btn-lg layui-btn-fluid layui-btn-radius" 
                style="background: linear-gradient(126deg, #255542 0%, #255542 100%);
                       
                       color: #FFFFFF !important;
                       font-weight: 700">
              Deposit Now
            </button>
        </div>
    </form>
</div>

<!-- Instructions Card -->
<div class="instructions_card">
    <p>1. Enter the deposit amount or select a quick amount.</p>
    <p>2. Deposit must be between {{ setting('currency')}} 100 and {{ setting('currency')}} 5000000.</p>
    <p>3. Deposits are processed within 5 minutes.</p>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay">Processing payment...</div>

@include('alert-message')

<!-- JavaScript -->
<script>
function getAmount(_this, amount) {
    document.querySelector('#deposit_amount').value = amount;
    document.querySelectorAll('.quick').forEach(q => q.classList.remove('quick_active'));
    _this.classList.add('quick_active');
}

function goPayment(event) {
    event.preventDefault();
    const overlay = document.getElementById('loadingOverlay');
    const amount = document.getElementById('deposit_amount').value;
    const method = document.querySelector('input[name="payment_method"]:checked');

    if(!method) {
        alert("Select payment channel");
        return;
    }
    if(!amount || amount <= 0) {
        alert("Enter deposit amount");
        return;
    }

    overlay.style.display = 'flex';

    setTimeout(() => {
        overlay.style.display = 'none';
        window.location.href = '{{ url("user/payment") }}/' + amount + '/' + method.value;
    }, 1500);
}
</script>

</body>
</html>
