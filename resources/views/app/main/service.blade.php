<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{env('APP_NAME')}} Help Center</title>
  <link rel="stylesheet" href="/public/site/layui/css/layui.css">
  <link rel="stylesheet" href="/public/site/css/common.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <style>
    .layui-collapse { border: none !important; }
    .layui-colla-title {
        position: relative;
        height: 42px;
        line-height: 42px;
        padding: 0;
        padding-right: 35px;
        color: #333;
        background-color: #FFFFFF;
        cursor: pointer;
        font-size: 14px;
        overflow: hidden;
    }
    .q {
        font-family: PingFang SC, PingFang SC;
        font-weight: 400;
        font-size: 18px;
        color: #67AD4F;
        line-height: 42px;
        padding-right: 10px;
    }
    .a {
        font-family: PingFang SC, PingFang SC;
        font-weight: 400;
        font-size: 18px;
        color: #FF8439;
        line-height: 22px;
        padding-right: 10px;
    }
    .layui-colla-icon {
        position: absolute;
        right: 15px;
        top: 0;
        font-size: 14px;
    }
    .answer_text {
        font-family: PingFang SC, PingFang SC;
        font-weight: 400;
        font-size: 13px;
        color: #666;
        line-height: 18px;
        text-align: left;
    }
    .layui-colla-content {
        background: #F7F7F7;
        border-radius: 8px;
        padding: 10px;
    }
    .flex_left {
        display: flex;
        align-items: flex-start;
        gap: 5px;
    }
  </style>
  <style id="ss-chat-custom-css">.ss-chat-body {overflow: hidden !important}</style>
</head>
<body class="common_body">

  <!-- Header -->
  <div class="common_header" style="height: auto; background: none">
    <a href="javascript:history.back(-1)" class="back position">
      <p class="btn"><i class="layui-icon layui-icon-left layui-font-20"></i></p> Help Center
    </a>
  </div>

  <!-- Support Options -->
  <div class="layui-row layui-col-space15" style="padding: 15px">
    <a href="https://t.me/nano_dev" class="layui-col-xs6 layui-col-md6">
      <div class="help_nav_card">
        <img src="/public/site/img/help/telegram.png">
        <p>Telegram Channel</p>
      </div>
    </a>
    <div class="service layui-col-xs6 layui-col-md6">
      <div class="help_nav_card">
        <img src="/public/site/img/help/service.png">
        <p>Online Support</p>
      </div>
    </div>
  </div>

  <!-- Deposit issue -->
  <div class="help_card" style="margin-top: 30px;">
    <a href="/feedback" class="help_flex">
      <div class="logo">
        <img src="/public/site/img/help/recharge.png" style="background:#fff;border-radius:50px;">
      </div>
      <div>
        <p class="title" style="color:#222">Your deposit has not been received yet?</p>
        <p class="describe" style="color:#333">After successfully charging your account, if the balance has not been entered into your account, please provide it here and customer service will assist you.</p>
      </div>
    </a>
  </div>

  <!-- Telegram -->
  <div class="help_card">
    <a href="https://t.me/nano_dev" class="help_flex">
      <div class="logo">
        <img src="/public/site/img/help/telegram.png">
      </div>
      <div>
        <p class="title" style="color:#222">Telegram</p>
        <p class="describe" style="color:#333">Follow our official Telegram channel to get the latest event news and benefits.</p>
      </div>
    </a>
  </div>

  <!-- FAQ -->
  <div class="help_card" style="margin-top: 20px;">
    <p class="help_title">Common Questions</p>
    <div class="layui-collapse" lay-accordion>
      <div class="layui-colla-item">
        <div class="layui-colla-title">
          <span class="q">Q</span>Payment issues?
          <i class="layui-icon layui-colla-icon">&#xe602;</i>
        </div>
        <div class="layui-colla-content">
          <div class="flex_left">
            <p class="a">A</p>
            <p class="answer_text">If you experience any payment issues, please contact customer support directly.</p>
          </div>
        </div>
      </div>
      <div class="layui-colla-item">
        <div class="layui-colla-title">
          <span class="q">Q</span>Order payment problems?
          <i class="layui-icon layui-colla-icon">&#xe602;</i>
        </div>
        <div class="layui-colla-content">
          <div class="flex_left">
            <p class="a">A</p>
            <p class="answer_text">For any order payment problems, please contact our customer service team immediately.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div id="service" style="width: 36px !important;">
    <a href="https://t.me/nano_dev" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px">
      <img class="step1" src="/public/site/img/service/telegram.png" style="width: 30px;height: 30px;">
    </a>
    <a href="/orders" class="step2" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px">
      <img src="/public/site/img/common/order.png" style="width: 20px;height: 20px;">
    </a>
    <a href="/help" class="step3" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;">
      <img src="/public/site/img/service/service.png" style="width: 36px;height: 36px;">
    </a>
  </div>

  <!-- Layui Script -->
  <script src="/public/site/layui/layui.js"></script>
  <script>
    layui.use(['element'], function(){
      var $ = layui.jquery;
      var element = layui.element;

      // Chat support
      $('.service').click(function(){
        ssq.push('chatOpen');
      });
    });
  </script>
</body>
</html>
