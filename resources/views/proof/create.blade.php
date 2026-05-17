<html>
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<title>Post Blog</title> 
<link rel="stylesheet" href="/public/site/layui/css/layui.css"> 
<link rel="stylesheet" href="/public/site/css/common.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
    .title{
        font-family: Arial, Arial;
        font-weight: 700;
        font-size: 18px;
        color: #333333;
        line-height: 21px;
        padding-bottom: 15px;
    }
    .layui-textarea{
        background: #F6F6F6;
        border-radius: 8PX;
        font-family: Arial, Arial;
        font-weight: 400;
        font-size: 16px;
        color: #333333;
    }
    textarea::placeholder { color: #C4C4C4; }
    .post_content {
        margin: 15px;
        background: #FFFFFF;
        border-radius: 16px;
        padding: 15px;
    }
    .post_btn{
        background: linear-gradient(126deg, #F1A12F 0%, #FFC97B 100%);
        box-shadow: 0px 4px 16px 0px rgba(255,163,32,0.15);
        font-family: Arial, Arial;
        font-weight: 700;
        font-size: 18px;
        color: #FFFFFF;
        height: 44px;
        line-height: 44px;
    }
    .blog_image_list{ display: flex; flex-wrap: wrap; margin-top: 10px; margin-bottom: 10px; }
    .blog_image_list .upload-preview{ position: relative; margin-right:10px; margin-bottom:10px; }
    .blog_image_list img{ width:80px; height:80px; border-radius:8px; object-fit:cover; }
    .upload-preview .delete-btn{
        position:absolute; top:-8px; right:-8px; border:none; background:red; color:#fff; border-radius:50%; width:20px; height:20px; cursor:pointer;
    }
    #upload_blog_image{
        height:100px; width:100px; background:#F6F6F6; text-align:center; line-height:100px; cursor:pointer; border-radius:8px; display:flex; justify-content:center; align-items:center; margin-bottom:40px;
    }
    #upload_blog_image i{ font-size:30px; color:#4CAF50; }
</style>
</head>
<body class="common_body" style="background: #FFFFFF"> 

<div class="common_header"> 
   <a href="javascript:history.back(-1)" class="back position"> 
       <p class="btn" style="color: #000"><i class="layui-icon layui-icon-left layui-font-20"></i></p> Post Blog 
   </a> 
</div> 

<form method="POST" action="{{ route('proof.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="post_content"> 
        <input name="avatar" id="avatar" type="hidden" value="/public/uploads/user/avatar.png"> 
        <div class="demo-login-container"> 
            <div class="layui-form-item layui-form-text"> 
                <div class="layui-inline"> 
                    <textarea rows="10" lay-verify="required" placeholder="Please enter your content" id="content" name="comment" class="layui-textarea">{{ old('comment') }}</textarea> 
                </div> 
            </div> 

            <div class="blog_image_list" id="preview-container">
                <!-- Image previews will appear here -->
            </div> 

            <div id="upload_blog_image"> 
                <i class="layui-font-30 layui-icon layui-icon-camera layui-font-green"></i> 
            </div>
            <input class="layui-upload-file" type="file" accept="image/*"  name="photo" id="image" style="display:none;"> 
        </div> 
    </div> 

    <div style="position: fixed; bottom: 0; left: 0px; width: 100%; height: 70px; background: #FFFFFF; box-shadow: 0px 4px 16px rgba(0,0,0,0.25);"> 
        <div class="layui-form-item" style="padding: 15px;"> 
            <button type="submit" class="layui-btn layui-btn-lg layui-btn-fluid layui-btn-radius post_btn" lay-submit="" lay-filter="postClub">Post</button> 
        </div> 
    </div> 
</form> 

@include('alert-message')

<script>
const uploadDiv = document.getElementById('upload_blog_image');
const fileInput = document.getElementById('image');
const previewContainer = document.getElementById('preview-container');

uploadDiv.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function(event){
    const file = event.target.files[0];
    if(file){
        const wrapper = document.createElement('div');
        wrapper.className = 'upload-preview';

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);

        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'delete-btn';
        deleteBtn.innerText = '×';
        deleteBtn.onclick = () => {
            fileInput.value = '';
            wrapper.remove();
        }

        wrapper.appendChild(img);
        wrapper.appendChild(deleteBtn);
        previewContainer.appendChild(wrapper);
    }
});
</script>

</body>
</html>
