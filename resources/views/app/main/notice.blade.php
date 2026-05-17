<html>
 <head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <title>Notice</title> 
  <link rel="stylesheet" href="/public/site/layui/css/layui.css"> 
  <link rel="stylesheet" href="/public/site/css/common.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <style>
        .mail_title {
          display: -webkit-box;
          -webkit-box-orient: vertical;
          -webkit-line-clamp: 1; /* 定义显示的行数 */
          overflow: hidden;
          text-overflow: ellipsis;
        }
        .layui-panel-window{background:#FFFFFf !important;border-top: none }
        .mail_contents {
            margin-bottom: 5px !important;
        }
        .mail_date {
            margin-bottom: 5px !important;
            text-align: left;
        }
     
        .mail_contents {
          display: -webkit-box;
          -webkit-box-orient: vertical;
          -webkit-line-clamp: 3; /* 定义显示的行数 */
          overflow: hidden;
          text-overflow: ellipsis;
           text-align: left;
        }
    </style> 
 </head> 
 <body class="page_common_body"> 
  <div class="common_header" style="background: none"> 
   <a href="javascript:history.back(-1)" class="back position"> <p class="btn"><i class="layui-icon layui-icon-left layui-font-20"></i></p> Notice </a> 
  </div> 
  <div class="mail_main" style="top: -60px;"> 
   <a ref="/noticeDetails/3" class="mail_card" style="display:block;box-shadow: 0px 4px 10px 0px rgba(42, 65, 92, 0.5);"> 
    <div class="flex_left"> 
     <img src="/public/uploads/user/20250814162120873286.jpg" style="width:100px;height:100px;border-radius:8px;margin-right:10px;"> 
     <div style="width:100%"> 
      <p class="mail_title" style="margin-bottom: 5px !important;">The Lucky Wheel</p> 
      <p style="color:#666666;margin-bottom: 10px !important;">2025-08-14 16:19:56</p> 
      <div class="mail_contents"></div> 
     </div> 
    </div> </a> 
   <a ref="/noticeDetails/2" class="mail_card" style="display:block;box-shadow: 0px 4px 10px 0px rgba(42, 65, 92, 0.5);"> 
    <div class="flex_left"> 
     <img src="/public/uploads/user/20250814162146414196.jpg" style="width:100px;height:100px;border-radius:8px;margin-right:10px;"> 
     <div style="width:100%"> 
      <p class="mail_title" style="margin-bottom: 5px !important;">VIP Member Sign-in Reward</p> 
      <p style="color:#666666;margin-bottom: 10px !important;">2025-08-14 16:00:32</p> 
      <div class="mail_contents"></div> 
     </div> 
    </div> </a> 
   <a ref="/noticeDetails/1" class="mail_card" style="display:block;box-shadow: 0px 4px 10px 0px rgba(42, 65, 92, 0.5);"> 
    <div class="flex_left"> 
     <img src="/public/uploads/user/20250814125521302953.jpg" style="width:100px;height:100px;border-radius:8px;margin-right:10px;"> 
     <div style="width:100%"> 
      <p class="mail_title" style="margin-bottom: 5px !important;">Invite Friends Bonus</p> 
      <p style="color:#666666;margin-bottom: 10px !important;">2025-08-14 12:55:23</p> 
      <div class="mail_contents"></div> 
     </div> 
    </div> </a> 
  </div> 
  <div id="service" style="width: 36px !important;"> 
   <a href="https://t.me/nano_dev" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img class="step1" src="/public/site/img/service/telegram.png" style="width: 30px;height: 30px;"> </a> 
   <a href="/orders" class="step2" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img src="/public/site/img/common/order.png" style="width: 20px;height: 20px;"> </a> 
   <a href="/help" class="step3" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;"> <img src="/public/site/img/service/service.png" style="width: 36px;height: 36px;"> </a> 
  </div> 
  <div class="footer_menu"> 
   <div class="content"> 
    <a href="/" class="item "> <img src="/public/site/img/footer/home.png"> <p>Home</p> </a> 
    <a href="/product" class="item "> <img src="/public/site/img/footer/stable.png"> <p>Invest</p> </a> 
    <a href="/notice" class="item position" style="padding: 0px"> <p style="position:absolute;top: -20px;margin:0px auto;width: 100%;border:5px solid #fff;border-radius:50%;line-height:50px;width: 50px;height: 50px;background: #FFA320;"> <img src="/public/site/img/footer/notice.png" style="display:inline-block;height: 36px;width: 36px;"> </p> <p style="position: absolute;bottom: 10px;text-align: center;margin:0px auto;width: 100%;">Notice</p> </a> 
    <a href="/blog" class="item "> <img src="/public/site/img/footer/club.png"> <p>Blog</p> </a> 
    <a href="/my" class="item "> <img src="/public/site/img/footer/account.png"> <p>Account</p> </a> 
   </div> 
  </div> 
  <script>
    layui.use(function(){
        var $ = layui.jquery;
        var layer = layui.layer;
        var form = layui.form;
        var laydate = layui.laydate;
        var slider = layui.slider;
        var element = layui.element;
        $('.mail').click(function(){
            var title = $(this).attr('data-title')
            var contents = $(this).attr('data-content')
            layer.open({
                type: 1,
                area: ['90%', '300px'], // 宽高
                title: false, // 不显示标题栏
                closeBtn: true,
                shadeClose: true, // 点击遮罩关闭层
                content: '<div style="padding: 16px;border-radius: 10px">' +
                    '<h3 class="layui-padding-1">'+title+'</h3>' +
                    '<p class="layui-padding-1 layui-font-16"> ' +
                    '      <textarea placeholder="" rows="10" class="layui-textarea" style="border: none">'+contents+'</textarea>\n' +
                    '</p>' +
                    '</div>'
            });
        })
    });
</script> 
 </body>
</html>