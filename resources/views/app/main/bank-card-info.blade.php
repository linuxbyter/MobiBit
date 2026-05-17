@php
    $accountNumber = $bankAccount ? $bankAccount->bank_account : '';
    $accountName = $bankAccount ? $bankAccount->full_name : '';
    $bankName = $bankAccount ? $bankAccount->bank_name : '';
    $bankCode = $bankAccount ? $bankAccount->bank_code : '';
    $swiftCode = $bankAccount ? $bankAccount->ifsc : '';
    $phoneNumber = $bankAccount ? $bankAccount->phone_number : '';
    $default = $bankAccount ? $bankAccount->is_default : false;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Bank Card Info</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<link rel="stylesheet" href="/public/site/css/common.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #f0f2f5;
    color: #333;
    overflow-x: hidden;
}

/* Fixed Header */
.header_fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #27C85D;
    color: #fff;
    padding: 15px;
    font-size: 18px;
    font-weight: 600;
    text-align: center;
    z-index: 999;
    display: flex;
    align-items: center;
}

.header_fixed .back_btn {
    position: absolute;
    left: 15px;
    font-size: 20px;
    cursor: pointer;
}

/* Scrollable Content */
.main_content {
    padding: 70px 15px 100px 15px; /* top + bottom for fixed header/footer */
    max-height: calc(100vh - 170px);
    overflow-y: auto;
}

/* Card */
.common_card {
    background: #fff;
    border-radius: 16px;
    margin-bottom: 15px;
    padding: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* Form styles */
.layui-form-item {
    background: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #DCDCDC;
    margin-bottom: 12px;
}

.layui-input {
    background: none;
    color: #333;
    border: none;
}

.layui-btn-fluid {
    background: linear-gradient(102deg, #27C85D 0%, #24A196 100%);
    color: #fff !important;
}

/* Fixed Footer */
.footer_fixed {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #27C85D;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
    padding: 8px 0;
    display: flex;
    justify-content: space-around;
    z-index: 999;
}

.footer_fixed a {
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    text-align: center;
}

.footer_fixed a.active span {
    color: #FFD700;
}

.footer_fixed i {
    font-size: 20px;
    margin-bottom: 2px;
}

/* Loading */
.loading {
    position: fixed;
    display: none;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    z-index: 1000;
}
</style>
</head>
<body>

<!-- Fixed Header -->
<div class="header_fixed">
    <i class="fas fa-arrow-left back_btn" onclick="history.back()"></i>
    Bank Card Info
</div>

<!-- Scrollable Content -->
<div class="main_content">
    <div class="common_card">
        <form action="{{ route('setup.gateway.submit') }}" class="layui-form" method="post">
            @csrf
            <input name="id" type="hidden" value="">
            <div class="layui-form-item">
                <select name="bank_code" lay-verify="required">
                    <option value="">Please Select Bank</option>
                   
                        <option value="MTN" >MTN</option></option>
                         <option value="AIRTEL" >AIRTEL</option></option>
                          
                   
                </select>
            </div>
            <div class="layui-form-item">
                <input type="text" name="realname" value="{{ $accountName }}" lay-verify="required" placeholder="Card Holder Name" class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="text" name="gateway_number" value="{{ $accountNumber }}" lay-verify="required" placeholder="Bank Account" class="layui-input">
            </div>
            <div class="layui-form-item">
                <input type="password" name="trade_password" lay-verify="required" placeholder="Trade Password" class="layui-input">
            </div>
            <div class="layui-form-item" style="border: none;">
                <button type="submit" class="layui-btn layui-btn-lg layui-btn-fluid layui-btn-radius">Add Bank Card</button>
            </div>
        </form>
    </div>

    <div class="common_card">
        <p><strong>Explain:</strong></p>
        <p>1. You can add only one bank account for withdrawal purposes.</p>
        <p>2. Wrong banking details result in loss of funds.</p>
        <p>3. No refund in any cases. Make sure your bank details are correct.</p>
    </div>
</div>

<!-- Loading -->
<img src="{{ asset('public/loading.gif') }}" class="loading" alt="Loading">

<!-- Fixed Footer -->
<div class="footer_fixed">
    <a href="/home"><i class="fas fa-house"></i><span>Home</span></a>
    <a href="/bank-card" class="active"><i class="fas fa-credit-card"></i><span>Bank Card</span></a>
    <a href="/orders"><i class="fas fa-box"></i><span>Orders</span></a>
    <a href="/my"><i class="fas fa-user"></i><span>My</span></a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.all.js"></script>
<script>
layui.use('form', function() {
    var form = layui.form;
    form.render();
});
</script>

</body>
</html>
