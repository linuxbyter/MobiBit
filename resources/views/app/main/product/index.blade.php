<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>product_{{env('APP_NAME')}}</title>
<link rel="stylesheet" href="/public/site/layui/css/layui.css">
<link rel="stylesheet" href="/public/site/css/common.css">
<link rel="stylesheet" href="/public/site/css/swiper-bundle.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
/* ==== @nano_dev ==== */
.index_balance_item{width:150px;text-align:center;}
.index_balance_label{font-family:Arial;font-weight:400;font-size:12px;color:#FFFBF6;line-height:14px;text-align:center;}
.index_balance_value{margin-top:5px;font-family:HarmonyOS Sans;font-weight:700;font-size:18px;color:#FFFFFF;line-height:22px;text-align:center;}
.step_btn{width:120px !important;}
.product_image{width:130px;height:100px !important;background:#67AD4F;border-radius:8px;padding-bottom:0;}
.product_image img{width:130px;height:100px;border-radius:8px;}
.product_card .product_content{padding:15px !important;}
.product_vip_btn{width:70px;height:26px;background:#F5ECD8;font-family:DingTalk JinBuTi;font-weight:400;font-size:16px;color:#DB9800;text-align:center;border-radius:8px;}
.product_vip_btn{position:absolute;top:0;right:0;border-radius:0 12px 0 12px;}
.product_card .product_content .product_title .product_info{padding:0;}
.product_name{font-family:Arial;font-weight:700;font-size:16px;color:#181818;line-height:16px;text-align:left;margin-bottom:0;}
.product_info{padding-right:10px !important;}
.product_card .product_content .price{font-weight:700;color:#181818;font-size:14px;line-height:14px;}
.unit{color:#181818 !important;position:unset !important;font-weight:700;}
.product_item .label{font-weight:400;font-size:12px;color:#666666;line-height:14px;}
.product_item .value{margin-left:0 !important;color:#51595D !important;font-weight:400 !important;}
.buy_btn{height:36px;background:#FFA320;border-radius:8px;font-family:PingFang SC;font-weight:400;font-size:14px;color:#FFFFFF;line-height:36px;text-align:center;margin-top:10px;}
.product_details_dialog{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:90%;max-width:400px;height:auto;max-height:90vh;background:#fff;border-radius:12px;box-shadow:0 5px 20px rgba(0,0,0,0.3);z-index:9999;display:none;overflow-y:auto;padding:20px;}
.dialog_overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9998;display:none;}
.hide{display:none !important;}
</style>
</head>
<body class="common_body">

<div class="product_header">
    <div class="product_header_title">Investment Products</div>
</div>
<div class="common_main common_position">

    <!-- Product Type Navigation -->
    <div class="product_type_card">
        <div class="product_type_list flex_space">
            <!-- Stable / Fixed -->
            <div class="product_type_nav product_type_nav_active" 
                 data-type="fixed" 
                 data-img-active="/public/site/img/product/stable_active.png" 
                 data-img-inactive="/public/site/img/product/stable.png">
                <img src="/public/site/img/product/stable_active.png" class="tab_img">
                <p class="title">Stable</p>
            </div> 
            <!-- Welfare -->
            <div class="product_type_nav" 
                 data-type="welfare" 
                 data-img-active="/public/site/img/product/welfare_active.png" 
                 data-img-inactive="/public/site/img/product/welfare.png">
                <img src="/public/site/img/product/welfare.png" class="tab_img">
                <p class="title">Welfare</p>
            </div>

            <!-- Activity -->
            <div class="product_type_nav" 
                 data-type="activity" 
                 data-img-active="/public/site/img/product/activity_active.png" 
                 data-img-inactive="/public/site/img/product/activity.png">
                <span style="color:red;font-weight:700;position:absolute;top:5px;left:-25px;">
                   <!-- <span class="layui-badge layui-bg-orange">HOT</span>-->
                </span>
                <img src="/public/site/img/product/activity.png" class="tab_img">
                <p class="title">Activity</p>
            </div>
        </div>
    </div>
<!--<div class="common_main common_position"> 
<div class="product_type_nav product_type_nav_active" data-type="fixed" data-img-active="/public/site/img/product/stable_active.png" data-img-inactive="/public/site/img/product/stable.png">
    <img src="/public/site/img/product/stable_active.png" class="tab_img">
    <p class="title">Stable</p>
</div>

<div class="product_type_nav" data-type="welfare" data-img-active="/public/site/img/product/welfare_active.png" data-img-inactive="/public/site/img/product/welfare.png">
    <img src="/public/site/img/product/welfare.png" class="tab_img">
    <p class="title">Welfare</p>
</div>

<div class="product_type_nav" data-type="activity" data-img-active="/public/site/img/product/activity_active.png" data-img-inactive="/public/site/img/product/activity.png">
    <span style="color:red;font-weight:700;position:absolute;top:5px;left:-25px;">
        <span class="layui-badge layui-bg-orange">HOT</span>
    </span>
    <img src="/public/site/img/product/activity.png" class="tab_img">
    <p class="title">Activity</p>
</div>

    <!-- Product Type Navigation --
    <div class="product_type_card">
        <div class="product_type_list flex_space">
            <div class="product_type_nav product_type_nav_active" data-type="fixed">
                <img src="/public/site/img/product/stable_active.png">
                <p class="title">Stable</p>
            </div>
            <div class="product_type_nav" data-type="welfare">
                <img src="/public/site/img/product/welfare.png">
                <p class="title">Welfare</p>
            </div>
            <div class="product_type_nav" data-type="activity">
                <span style="color:red;font-weight:700;position:absolute;top:5px;left:-25px;">
                    <span class="layui-badge layui-bg-orange">HOT</span>
                </span>
                <img src="/public/site/img/product/activity.png">
                <p class="title">Activity</p>
            </div>
        </div>
    </div>

    <!-- Product Lists -->
    <div id="fixed" class="product_list">
        <!-- PHP Example -->
        <?php
        use App\Models\Package;
        $packages = Package::where('status','active')->get();
        foreach($packages as $package){
            if($package->category=='fixed'){
                ?>
                <a href="javascript:;" class="product_card position">
                    <div class="product_content">
                        <div class="product_title flex_space">
                            <div class="product_info" style="width:100%">
                                <div class="product_name flex_space">
                                    <span style="color:#FFA320">[V<?= $package->vip_level ?? 0 ?>]</span><?= $package->name ?>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Unit Price</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->price) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Daily Income</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount / $package->validity) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Revenue Days</p>
                                    <p class="value position" style="font-weight:700"><?= $package->validity ?> Days</p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Total Revenue</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount) ?></p>
                                </div>
                            </div>
                            <div class="product_image">
                                <img src="<?= asset($package->photo) ?>">
                            </div>
                        </div>
                        <div class="layui-btn layui-btn-fluid layui-btn-radius buy_btn"
                             onclick="buyDialog('<?= $package->id ?>','<?= $package->name ?>','<?= asset($package->photo) ?>','<?= price($package->price) ?>','<?= $package->validity ?>','<?= price($package->commission_with_avg_amount / $package->validity) ?>','<?= price($package->commission_with_avg_amount) ?>','<?= $package->max_share ?>','<?= $package->vip_level ?? 0 ?>')">
                            Invest Now
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>

    <div id="welfare" class="product_list hide">
        <?php
        foreach($packages as $package){
            if($package->category=='welfare'){
                ?>
                <a href="javascript:;" class="product_card position">
                    <div class="product_content">
                        <div class="product_title flex_space">
                            <div class="product_info" style="width:100%">
                                <div class="product_name flex_space">
                                    <span style="color:#FFA320">[V<?= $package->vip_level ?? 0 ?>]</span><?= $package->name ?>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Unit Price</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->price) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Daily Income</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount / $package->validity) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Revenue Days</p>
                                    <p class="value position" style="font-weight:700"><?= $package->validity ?> Days</p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Total Revenue</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount) ?></p>
                                </div>
                            </div>
                            <div class="product_image">
                                <img src="<?= asset($package->photo) ?>">
                            </div>
                        </div>
                        <div class="layui-btn layui-btn-fluid layui-btn-radius buy_btn"
                             onclick="buyDialog('<?= $package->id ?>','<?= $package->name ?>','<?= asset($package->photo) ?>','<?= price($package->price) ?>','<?= $package->validity ?>','<?= price($package->commission_with_avg_amount / $package->validity) ?>','<?= price($package->commission_with_avg_amount) ?>','<?= $package->max_share ?>','<?= $package->vip_level ?? 0 ?>')">
                            Invest Now
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>

    <div id="activity" class="product_list hide">
        <?php
        foreach($packages as $package){
            if($package->category=='activity'){
                ?>
                <a href="javascript:;" class="product_card position">
                    <div class="product_content">
                        <div class="product_title flex_space">
                            <div class="product_info" style="width:100%">
                                <div class="product_name flex_space">
                                    <span style="color:#FFA320">[V<?= $package->vip_level ?? 0 ?>]</span><?= $package->name ?>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Unit Price</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->price) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Daily Income</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount / $package->validity) ?></p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Revenue Days</p>
                                    <p class="value position" style="font-weight:700"><?= $package->validity ?> Days</p>
                                </div>
                                <div class="product_item flex_space">
                                    <p class="label">Total Revenue</p>
                                    <p class="value position" style="font-weight:700"><?= price($package->commission_with_avg_amount) ?></p>
                                </div>
                            </div>
                            <div class="product_image">
                                <img src="<?= asset($package->photo) ?>">
                            </div>
                        </div>
                        <div class="layui-btn layui-btn-fluid layui-btn-radius buy_btn"
                             onclick="buyDialog('<?= $package->id ?>','<?= $package->name ?>','<?= asset($package->photo) ?>','<?= price($package->price) ?>','<?= $package->validity ?>','<?= price($package->commission_with_avg_amount / $package->validity) ?>','<?= price($package->commission_with_avg_amount) ?>','<?= $package->max_share ?>','<?= $package->vip_level ?? 0 ?>')">
                            Invest Now
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>

<!-- Product Details Dialog -->
<div class="product_details_dialog" id="product_details_dialog">
    <div class="product_details_dialog_content layui-form">
        <input type="hidden" id="product_id">
        <div class="dialog_close_icon">
            <i class="layui-icon layui-icon-close layui-font-28" style="color:#C6C6C6"></i>
        </div>
        <div class="dialog_product_image">
            <img class="product_img" src="/public/site/img/product/product.png" style="width:80px;height:80px;border-radius:50%">
            <p class="product_name dialog_product_name" style="text-align:center;margin-top:5px;">Product</p>
        </div>
        <div class="product_details_item flex_space">
            <p class="label">Vip Level</p>
            <p class="value position vip_level">VIP1</p>
        </div>
        <div class="product_details_item flex_space">
            <p class="label">Unit Price</p>
            <p class="value position"> <span class="dialog_unit"></span> <span class="data_price">110000</span> </p>
        </div>
        <div class="product_details_item flex_space">
            <p class="label">Daily Income</p>
            <p class="value position"> <span class="dialog_unit"></span> <span class="data_daily_income">1000</span> </p>
        </div>
        <div class="product_details_item flex_space">
            <p class="label">Revenue Days</p>
            <p class="value position"> <span class="data_revenue_days">30</span> <span class="days">Days</span> </p>
        </div>
        <div class="product_details_item flex_space">
            <p class="label">Total Revenue</p>
            <p class="value position"> <span class="dialog_unit"></span> <span class="data_total_income product_pay_total_income">110000</span> </p>
        </div>
        <!--<div class="product_details_item flex_space" style="padding-bottom:0">
            <p class="label">Purchase Quantity</p>
            <div class="layui-input-wrap">
                <input type="number" id="buy_num" value="1" placeholder="Quantity" step="1" min="1" class="layui-input" style="height:44px;line-height:44px">
            </div>
        </div>-->
        <!--<div class="product_details_item flex_left" style="padding-top:0">
            <span class="label">Pay Money:</span>
            <p class="value product_pay_money" style="margin-left:12px"></p>
        </div>-->
        <button class="layui-btn layui-btn-fluid product_details_buy_btn" onclick="buyConfirm()">Invest Now</button>
    </div>
</div> 
<div class="footer_menu"> 
   <div class="content"> 
    <a href="/" class="item "> <img src="/public/site/img/footer/home.png"> <p>Home</p> </a> 
    <a href="/product" class="item active"> <img src="/public/site/img/footer/stable_active.png"> <p>Invest</p> </a> 
    <a href="/notice" class="item position" style="padding: 0px"> <p style="position:absolute;top: -20px;margin:0px auto;width: 100%;border:5px solid #fff;border-radius:50%;line-height:50px;width: 50px;height: 50px;background: #FFA320;"> <img src="/public/site/img/footer/notice.png" style="display:inline-block;height: 36px;width: 36px;"> </p> <p style="position: absolute;bottom: 10px;text-align: center;margin:0px auto;width: 100%;">Notice</p> </a> 
    <a href="/blog" class="item "> <img src="/public/site/img/footer/club.png"> <p>Blog</p> </a> 
    <a href="/my" class="item "> <img src="/public/site/img/footer/account.png"> <p>Account</p> </a> 
   </div> 
  </div> 
@include('alert-message')
<script src="/public/site/layui/layui.js"></script>
<script>
// ===== TAB SWITCH =====
const tabs = document.querySelectorAll('.product_type_nav');
const productLists = {
    fixed: document.getElementById('fixed'),
    welfare: document.getElementById('welfare'),
    activity: document.getElementById('activity')
};

tabs.forEach(tab => {
    tab.addEventListener('click', function() {
        const type = this.getAttribute('data-type');

        // Reset all tabs
        tabs.forEach(t => {
            t.classList.remove('product_type_nav_active');
            const img = t.querySelector('.tab_img');
            if(img && t.getAttribute('data-img-inactive')){
                img.src = t.getAttribute('data-img-inactive'); // set inactive image
            }
        });

        // Hide all product lists
        Object.values(productLists).forEach(list => list.classList.add('hide'));

        // Activate current tab
        this.classList.add('product_type_nav_active');
        const activeImg = this.getAttribute('data-img-active');
        if(this.querySelector('.tab_img') && activeImg){
            this.querySelector('.tab_img').src = activeImg;
        }

        // Show product list
        if(productLists[type]){
            productLists[type].classList.remove('hide');
        }
    });
});

// ===== BUY DIALOG =====
function buyDialog(id,name,image,price,days,daily,total,max_share,vip){
    document.getElementById('product_id').value = id;
    document.querySelector('.dialog_product_name').innerText = name;
    document.querySelector('.product_img').src = image;
    document.querySelector('.data_price').innerText = price;
    document.querySelector('.data_revenue_days').innerText = days;
    document.querySelector('.data_daily_income').innerText = daily;
    document.querySelector('.data_total_income').innerText = total;
    document.querySelector('.vip_level').innerText = 'VIP'+vip;

    //const qty = parseInt(document.getElementById('buy_num').value) || 1;
    //document.querySelector('.product_pay_money').innerText = "₹" + (parseFloat(price) * qty).toFixed(2);

    document.getElementById('product_details_dialog').style.display = 'block';
}

// ===== CLOSE DIALOG =====
document.querySelector('.dialog_close_icon').addEventListener('click', function(){
    document.getElementById('product_details_dialog').style.display = 'none';
});

// ===== UPDATE TOTAL PAY WHEN QUANTITY CHANGES =====
document.getElementById('buy_num').addEventListener('input', function(){
    let price = parseFloat(document.querySelector('.data_price').innerText) || 0;
    let qty = parseInt(this.value) || 1;
    document.querySelector('.product_pay_money').innerText = "₹" + (price * qty).toFixed(2);
});

// ===== BUY CONFIRM =====
function buyConfirm(){
    const productId = document.getElementById('product_id').value;
    // Redirect to purchase confirmation page
    window.location.href = '/purchase/confirmation/' + productId;
}
</script>


</body>
</html>
