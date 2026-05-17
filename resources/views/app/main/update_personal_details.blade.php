<html>
 <head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <title>Setting Info</title> 
  <link rel="stylesheet" href="/public/site/layui/css/layui.css"> 
  <link rel="stylesheet" href="/public/site/css/common.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <style>
        .layui-panel-window {
            background: #FFFFFF !important;
            border-top: none
        }

        .layui-form-item {
            background: none;
            border-radius: 8px;
            border: 1px solid #CFD0D9;
            height: 50px;
            line-height: 50px;
        }

        .layui-input {
            background: none;
            color: #2A415C;
            font-weight: 400;
            border: none;
            height: 50px;
            line-height: 50px;
        }

        .login_btn {
            background: linear-gradient( 126deg, #F1A12F 0%, #FFC97B 100%);
            box-shadow: 0px 4px 16px 0px rgba(252,179,75,0.15);
            font-family: Arial, Arial;
            font-weight: 700;
            font-size: 18px;
            color: #FFFFFF;
            height: 44px;
            line-height: 44px;
        }
        .logout_btn {
            background: #ffffff;
            box-shadow: 0px 4px 16px 0px rgba(252,179,75,0.15);
            font-family: Arial, Arial;
            font-weight: 700;
            font-size: 18px;
            color: #F1A12F;
            border: 1px #F1A12F solid;
            height: 44px;
            line-height: 44px;
        }
    </style> 
 </head> 
 <body class="page_common_body"> 
  <div class="common_header" style="background: none"> 
   <a href="javascript:history.back(-1)" class="back position"> <p class="btn"><i class="layui-icon layui-icon-left layui-font-20"></i></p> Setting Info </a> 
  </div> 
  <!-- Profile Picture Upload --> 
  <div style="margin: auto; text-align: center; margin-top: 30px"> 
   <img src="{{setting('logo')}}" style="width: 100px; height: 100px" id="upload_avatar">
   <input class="layui-upload-file" type="file" accept="image/*" name="file"> 
   <div style="margin-top: 10px"> 
    <p class="page_title" style="font-weight: 400; font-size: 14px; color: #333333;"> Upload New Profile Picture </p> 
    <p class="page_desc">Recommended size: 200px * 200px</p> 
   </div> 
  </div> 
  <!-- Profile Information Form --> 
  <div style="margin: 15px"> 
   <div style="background: #FFFFFF; border-radius: 16px;"> 
    <div class="layui-panel-window layui-font-16" style="border-radius: 8px;"> 
     <form class="layui-form" lay-filter="saveProfileInfoForm"> 
      <input name="avatar" id="avatar" type="hidden" value="/public/uploads/user/avatar.png"> 
      <div class="demo-login-container"> 
       <!-- Nickname Field --> 
       <div style="margin-top: 20px; margin-bottom: 7px; color: #333333; font-size: 18px;">
        Nickname
       </div> 
       <div class="layui-form-item"> 
        <input type="text" name="nickname" value="@nano_coders" lay-verify="required" placeholder="Enter your nickname" autocomplete="off" class="layui-input"> 
       </div> 
       <!-- Email Field --> 
       <!--                    <div style="margin-top: 20px; margin-bottom: 7px; color: #333333; font-size: 18px;">Email</div>--> 
       <!--                    <div class="layui-form-item">--> 
       <!--                        <input type="text" name="email" value="" lay-verify="required|email" placeholder="Enter your email" autocomplete="off" class="layui-input">--> 
       <!--                    </div>--> 
       <!-- Password Settings Links --> 
       <!--<a href="/password" class="page_record_bar flex_space" style="margin-bottom: 20px">--> 
       <!--    <div>--> 
       <!--        <span>Login Password</span>--> 
       <!--    </div>--> 
       <!--    <div>--> 
       <!--        <i class="layui-icon layui-icon-right" style="color: #B6B6B6"></i>--> 
       <!--    </div>--> 
       <!--</a>--> 
       <!--<a href="/tradePassword" class="page_record_bar flex_space" style="margin-bottom: 20px">--> 
       <!--    <div>--> 
       <!--        <span>Transaction Password</span>--> 
       <!--    </div>--> 
       <!--    <div>--> 
       <!--        <i class="layui-icon layui-icon-right" style="color: #B6B6B6"></i>--> 
       <!--    </div>--> 
       <!--</a>--> 
       <!-- Save Button --> 
       <div class="layui-form-item" style="border: none; margin-top: 20px;"> 
        <button class="layui-btn layui-btn-lg layui-btn-fluid layui-btn-radius login_btn" lay-submit="" lay-filter="saveInfo"> Save Profile </button> 
       </div> 
       <!-- Logout Button --> 
       <div class="layui-form-item" style="border: none; margin-top: 20px;"> 
        <a href="/logout" class="layui-btn layui-btn-lg layui-btn-primary layui-btn-fluid layui-btn-radius logout_btn"> Log Out </a> 
       </div> 
      </div> 
     </form> 
    </div> 
   </div> 
  </div> 
  <!-- Footer Content --> 
  <div id="service" style="width: 36px !important;"> 
   <a href="https://t.me/nano_dev" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img class="step1" src="/public/site/img/service/telegram.png" style="width: 30px;height: 30px;"> </a> 
   <a href="/orders" class="step2" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;margin-bottom: 8px"> <img src="/public/site/img/common/order.png" style="width: 20px;height: 20px;"> </a> 
   <a href="/help" class="step3" style="width: 36px;height: 36px;background: #FFF0DA;border-radius: 50%;display: block;line-height: 36px;text-align: center;"> <img src="/public/site/img/service/service.png" style="width: 36px;height: 36px;"> </a> 
  </div> 
  <!-- Scripts --> 
  <script>
    layui.use(function(){
        var $ = layui.jquery;
        var layer = layui.layer;
        var form = layui.form;
        var upload = layui.upload;

        // Profile Picture Upload
        var uploadInst = upload.render({
            elem: '#upload_avatar',
            url: '/uploadPicture',
            acceptMime: 'image/*',
            accept: 'jpg|png|gif|jpeg',
            data: {'directory': 'avatar'},
            done: function(res){
                layer.msg(res.msg);
                if(res.status == 1){
                    $('#avatar').val(res.result.path);
                    $('#upload_avatar').attr('src', res.result.show_path);
                }
            },
            error: function(){
                layer.msg('Upload failed');
            }
        });

        // Form Submission
        form.on('submit(saveInfo)', function(data){
            var formData = data.field;
            $.post('/info', formData, function(res) {
                layer.msg(res.msg);
                if(res.status == 1){
                    window.location.href = '/my';
                }
            });
            return false; // Prevent default form submission
        });
    });
</script> 
 </body>
</html>