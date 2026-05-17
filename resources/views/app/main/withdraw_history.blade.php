<html>
 <head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <title>withdrawRecord</title> 
  <link rel="stylesheet" href="/public/site/layui/css/layui.css"> 
  <link rel="stylesheet" href="/public/site/css/common.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <style>
        .layui-layer-page {
            background-color: #FFFFFf;
        }
        .common_card{background:#FFFFFf }
        .layui-input{background: none}

        .layui-collapse{ border-radius: 15px;}
        .layui-colla-item{ }
        .layui-colla-title{

            font-family: Arial, Arial;
            font-weight: 700;
            font-size: 16px;
            color: #003862;
        }
        .layui-colla-title .success{color: #2BE26C;}
        .layui-colla-title .progress{color: #003862;}
        .layui-colla-title .returned{color: #FFA559;}
        .layui-colla-content,.layui-colla-item {
            border-top: 1px solid #dddddd;
        }
        .layui-colla-item .label {
            color: #ffffff;
        }
        .layui-colla-item .value {
            font-weight: 700;
            font-size: 16px;
            color: #ffffff;
            padding-left: 10px;
        }
        .padding{ padding: 10px 0}
        .bottom_order{
            border-bottom: 1px solid #EBEAEA;
        }
        .label{
            color: #666666 !important;
        }
        .value{
            color: #07262C !important;font-weight: 700;
        }
    </style> 
 </head> 
 <body class="page_common_body" style="background-image: url(/public/site/img/reward/record_bg.png);"> 
  <div class="common_header" style="background: none"> 
   <a href="javascript:history.back(-1)" class="back position"> <p class="btn"><i class="layui-icon layui-icon-left layui-font-20"></i></p> withdrawRecord </a> 
  </div> 
   <!-- Account Balance Summary --> 
  <div style="margin: auto; text-align: center"> 
   <img src="/public/site/img/reward/record_logo.png" style="width: 195px; height: 175px"> 
   <div style="margin-top: 30px"> 
    <p class="page_title"> <span class="position"> <span class="unit"></span> {{price(auth()->user()->balance)}}</span> </p> 
    <p class="page_desc">Account Balance</p> 
   </div> 
  </div> 
   <div style="margin-top:20px">
           @foreach(\App\Models\Withdrawal::where('user_id', auth()->id())->orderByDesc('id')->get() as $element)
    @php
        $statusColor = match($element->status) {
            'approved' => '#2BE26C',
            'progress' => '#003862',
            'rejected' => '#F44336',
            default => '#FF8725'
        };
    @endphp
    <a ref="/rechargeDetails/68202" class="common_card position" style="display:block"> 
     <div class="flex_space padding bottom_order"> 
      <p class="label">Withdrawal status</p> 
      <p class="value"> <span style="color: {{ $statusColor }}">{{ ucfirst($element->status) }}</span> </p> 
     </div> 
     <div href="/withdrawRecordDetails/68202" class="flex_space padding bottom_order"> 
      <p class="label">
         Withdrawal  Amount </p> 
      <p class="value position"> <span></span>{{ price($element->amount) }} </p> 
     </div> 
     <div href="/withdrawRecordDetails/68202" class="flex_space padding bottom_order"> 
      <p class="label">Received Amount</p> 
      <p class="value position"> <span></span>{{ price($element->final_amount) }}</p> 
     </div> 
     <div href="/withdrawRecordDetails/68202" class="flex_space padding bottom_order"> 
      <p class="label">tax amount</p> 
      <p class="value position"> <span></span> {{ price($element->charge_amount) }}</p> 
     </div> 
     <div href="/withdrawRecordDetails/68202" class="flex_space padding bottom_order"> 
      <p class="label">Initiation time</p> 
      <p class="value position"> {{ $element->created_at }} </p> 
     </div> </a> @endforeach
     
   </div> 
  </div> 
  <!-- Footer Content --> 
  <div id="service" style="width: 36px !important;"> 
   <a href="https://t.me/nano_dev" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img class="step1" src="/public/site/img/service/telegram.png" style="width: 30px;height: 30px;"> </a> 
   <a href="/orders" class="step2" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img src="/public/site/img/common/order.png" style="width: 20px;height: 20px;"> </a> 
   <a href="/help" class="step3" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;"> <img src="/public/site/img/service/service.png" style="width: 36px;height: 36px;"> </a> 
  </div> 
  <!--<a href="/help"  id="service">--> 
  <!--  <img src="/public/v1/img/common/service.png" style="width: 40px;height: 40px">--> 
  <!--</a>--> 
  <!-- body 末尾处引入 layui --> 
  <script>
     
 </body>
</html>