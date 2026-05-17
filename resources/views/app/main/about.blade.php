<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loan Center</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #eafff3, #ffffff);
    color: #14532d;
}

/* HEADER */
.header {
    text-align: center;
    padding: 22px;
    font-size: 24px;
    font-weight: bold;
    color: #15803d;
}

.sub {
    text-align: center;
    font-size: 13px;
    opacity: 0.8;
    margin-bottom: 10px;
    color: #166534;
}

/* MESSAGES */
.msg {
    margin: 10px;
    padding: 10px;
    border-radius: 8px;
    font-size: 13px;
}

.success { background:#dcfce7; color:#166534; }
.error { background:#fee2e2; color:#991b1b; }

/* GRID */
.container {
    padding: 15px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
}

/* CARD */
.loan-card {
    background: #ffffff;
    border: 1px solid #bbf7d0;
    border-radius: 18px;
    padding: 20px;
    text-align: center;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.15);
}

.loan-card:hover {
    transform: translateY(-5px);
    background: #f0fdf4;
}

.loan-amount {
    font-size: 22px;
    font-weight: bold;
    margin-top: 10px;
    color: #15803d;
}

.icon {
    font-size: 28px;
    color: #22c55e;
}

button {
    all: unset;
    display: block;
    width: 100%;
    cursor: pointer;
}

.badge {
    font-size: 11px;
    background: #dcfce7;
    color: #166534;
    padding: 4px 8px;
    border-radius: 20px;
    display: inline-block;
    margin-top: 8px;
}

/* REPAY BOX */
.repay-box {
    margin: 15px;
    padding: 15px;
    background: #ffffff;
    border: 1px solid #bbf7d0;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(34,197,94,0.15);
    text-align: center;
}

.repay-btn {
    background:#16a34a;
    color:#fff;
    padding:12px;
    border:none;
    border-radius:10px;
    width:100%;
    font-size:15px;
    font-weight:bold;
}

/* NOTE */
.note {
    text-align: center;
    font-size: 12px;
    margin-top: 25px;
    opacity: 0.8;
    padding: 0 15px;
    color: #166534;
}

/* FOOTER */
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
  z-index: 999;
}

.bottom_menu a {
  color: #e0e0e0;
  text-decoration: none;
  font-size: 12px;
  text-align: center;
}

.bottom_menu i {
  font-size: 18px;
  display: block;
}
</style>
</head>

<body>

<div class="header">💰 Loan Center</div>
<div class="sub">Choose a loan amount and check eligibility</div>

{{-- MESSAGES --}}
@if(session('success'))
<div class="msg success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="msg error">{{ session('error') }}</div>
@endif

{{-- ACTIVE LOAN --}}
@if($loan)
<div class="repay-box">
    <i class="fa-solid fa-wallet" style="font-size:28px;color:#22c55e;"></i>

    <h3 style="margin:10px 0;color:#15803d;">
        Active Loan: {{ number_format($loan->amount) }}
    </h3>

    <p style="font-size:12px;color:#166534;">
        You must repay this loan before applying again
    </p>

    <form method="POST" action="{{ route('loan.repay') }}">
        @csrf
        <button class="repay-btn">
            Repay Loan Now
        </button>
    </form>
</div>
@endif

{{-- LOANS --}}
<div class="container">

@php
$loans = [500,1500,3000,6000,10000,20000,30000,50000];
@endphp

@foreach($loans as $l)
<form method="POST" action="{{ route('loan.request') }}">
@csrf
<input type="hidden" name="amount" value="{{ $l }}">

<button type="submit">
    <div class="loan-card">
        <i class="fa-solid fa-hand-holding-dollar icon"></i>
        <div class="loan-amount">{{ number_format($l) }}</div>
        <div class="badge">Apply Now</div>
    </div>
</button>

</form>
@endforeach

</div>

<div class="note">
⚠️ Loans depend on your investment level. If you don’t qualify, increase transactions.
</div>

{{-- FOOTER --}}
<div class="bottom_menu">
  <a href="/home"><i class="fa-solid fa-house"></i>Home</a>
  <a href="/team"><i class="fa-solid fa-users"></i>Team</a>
  <a href="/blog"><i class="fa-solid fa-blog"></i>Blog</a>
  <a href="/my"><i class="fa-solid fa-user"></i>Mine</a>
</div>

<br><br><br>

</body>
</html>