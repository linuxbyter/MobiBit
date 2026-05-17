@php
    $user = auth()->user();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Bank Card Info</title>
<link rel="stylesheet" href="/public/v2/layui/css/layui.css">
<link rel="stylesheet" href="/public/site/css/common.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #f0f2f5;
    color: #333;
}

/* Header */
.header_fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #255542;
    color: #fff;
    padding: 15px 15px;
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

/* Scrollable Content */
.main_content {
    padding: 70px 15px 30px 15px; /* top for fixed header */
}

/* Cards */
.common_card {
    background: #fff;
    border-radius: 16px;
    margin-bottom: 15px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.input_title {
    font-weight: 600;
    margin-bottom: 6px;
    font-size: 14px;
}

.layui-form-item {
    background: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #DCDCDC;
    margin-bottom: 12px;
}

.layui-input {
    background: none;
    border: none;
    color: #333;
}

/* Center submit button in card */
.card_submit {
    text-align: center;
    margin-top: 10px;
}

.layui-btn {
    background: #255542;
    color: #fff !important;
    font-weight: 700;
    width: 60%;
}
</style>
</head>
<body>

<!-- Header -->
<div class="header_fixed">
    <i class="layui-icon layui-icon-left back_btn" onclick="history.back()"></i>
    <span>Bank Card Info</span>
</div>

<!-- Content -->
<div class="main_content">
    <!-- User Balance -->
    <div style="text-align:center;margin-bottom:20px;">
        <p style="font-size:24px;font-weight:600;">{{ setting('currency')}}{{ number_format($user->balance,2) }}</p>
        <p style="color:#666;">Withdrawal Balance</p>
    </div>

    <!-- Bank Card Form -->
    <div class="common_card">
        <form action="{{route('user.bank_setup_confirm')}}" class="layui-form" lay-filter="saveBankCardInfoForm" method="post">
            @csrf
            <input name="id" type="hidden" value="">

            <div class="input_title">Bank</div>
            <div class="layui-form-item">
                <select name="gateway_method" lay-verify="required">
                    <option value="">Please Select Bank</option>
                      <option value="MPESA" >MPESA</option>
                         <option value="AIRTEL" >AIRTEL</option>
                          
                </select>
            </div>

            <div class="input_title">Card Holder Name</div>
            <div class="layui-form-item">
                <input type="text" name="realname" value="{{ $user->realname }}" lay-verify="required" placeholder="Card holder name" autocomplete="off" class="layui-input">
            </div>

            <div class="input_title"> Account Number</div>
            <div class="layui-form-item">
                <input type="text" name="gateway_address" value="{{ $user->gateway_address }}" lay-verify="required" placeholder="Bank Account" autocomplete="off" class="layui-input">
            </div>

            <!-- Submit Button Centered -->
            <div class="card_submit">
                <button type="submit" class="layui-btn layui-btn-lg layui-btn-radius" lay-submit="" lay-filter="saveBankCardInfoForm">Add  Card</button>
            </div>
        </form>
    </div>

    <!-- Instructions Card -->
    <div class="common_card">
        <p>1. You can only add one bank card for withdrawal purposes.</p>
        <p>2. Bank card number cannot contain letters or symbols.</p>
        
    </div>
</div>

<!-- Loading -->
<img src="maxoimp/hzk6C.gif" class="loading" alt="Loading" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:100px;z-index:1000;">

<script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.all.js"></script>
<script>
layui.use('form', function() {
    var form = layui.form;
    form.render();

    form.on('submit(saveBankCardInfoForm)', function(data){
        document.querySelector('.loading').style.display = 'block';
        return true;
    });
});
</script>
</body>
</html>
