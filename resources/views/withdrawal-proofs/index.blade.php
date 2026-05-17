<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Investment Blog</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #f0f2f5;
    color: #fff;
    overflow-x: hidden;
  }

  /* Fixed Header with Back Button */
  .header_fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #255542;
    color: #fff;
    padding: 15px;
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .header_fixed .back_btn {
    position: absolute;
    left: 15px;
    font-size: 20px;
    cursor: pointer;
    color: #fff;
  }

  /* Scrollable Content */
  .main_content {
    padding: 120px 15px 80px 15px; /* extra top for header + boxes */
    overflow-y: auto;
    max-height: calc(100vh - 160px);
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  /* Two boxes below header */
  .blog_controls {
   
    display: flex;
    justify-content: space-around;
    width: 100%;
    max-width: 400px;
    margin-bottom: 15px;
  }

  .btn_blog {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
 background: #255542;
        border-radius: 12px;
    padding: 15px 0;
    cursor: pointer;
    transition: 0.3s;
    text-align: center;
  }

  .btn_blog img {
    width: 40px;
    height: 40px;
  }

  .btn_blog p {
    margin: 0;
    font-size: 14px;
  }

  .btn_blog:hover {
    background: rgba(0, 230, 118, 0.2);
  }

  /* Blog Cards */
  .card_blog {
    background: rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 15px;
    margin-bottom: 15px;
    width: 100%;
    max-width: 400px;
    backdrop-filter: blur(6px);
  }

  .card_header {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .avatar_blog {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    border: 2px solid #FFD700;
  }

  .nickname_blog {
    font-weight: 600;
    font-size: 16px;
    margin: 0;
  }

  .account_blog {
    font-size: 13px;
    color: #ccc;
    margin: 0;
  }

  .card_content {
    margin-top: 10px;
  }

  .text_blog {
    font-size: 15px;
    margin-bottom: 10px;
  }

  .blog_img {
    width: 100%;
    border-radius: 12px;
    margin-bottom: 8px;
  }

  .card_footer {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #ccc;
    margin-top: 10px;
  }

  /* Popup */
  #popup_overlay {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 998;
  }

  #popup_rules {
    display: none;
    position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 350px;
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    z-index: 9999;
    text-align: center;
    color: #000;
  }

  #popup_close {
    position: absolute;
    top:10px;
    right:15px;
    font-size:20px;
    font-weight:bold;
    cursor:pointer;
  }

  .btn_understand {
    display: block;
    margin: 20px auto 0 auto;
  }

  /* Bottom Menu */
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
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  z-index: 999;
}

.bottom_menu .menu_item {
  color: #e0e0e0;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 12px;
  cursor: pointer;
  transition: 0.3s ease;
  position: relative;
  padding: 6px 12px;
  border-radius: 10px;
  text-decoration: none;
}

.bottom_menu .menu_item i {
  font-size: 18px;
  margin-bottom: 3px;
}

.bottom_menu .menu_item.active {
  color: #fff;
  background: rgba(0, 230, 118, 0.2);
  box-shadow: 0 0 10px rgba(0, 230, 118, 0.3);
  transform: translateY(-3px);
}

.bottom_menu .menu_item.active i {
  color: #00e676;
}

.bottom_menu .menu_item:hover {
  color: #fff;
}
</style>
</head>
<body>

  <!-- Fixed Header -->
  <div class="header_fixed">
    <span class="back_btn" onclick="history.back()"><i class="fa-solid fa-arrow-left"></i></span>
    Withdraw Proof
  </div>

  <!-- Scrollable Content -->
  <div class="main_content">
    <!-- Two Box Buttons -->
    <div class="blog_controls">
      <div class="btn_blog btn_rules">
        <img src="/public/site/img/blog/rule_icon.png">
        <p>Blog Rules</p>
      </div>
      <a href="/postBlog" class="btn_blog">
        <img src="/public/site/img/blog/publish.png">
        <p>Create Post</p>
      </a>
    </div>

    <!-- Blog Cards -->
    @foreach(\App\Models\WithdrawProof::where('status', 'approved')->orderByDesc('id')->get() as $proof)
      <?php $user = \App\Models\User::find($proof->user_id); ?>
      <div class="card_blog">
        <div class="card_header">
          <img class="avatar_blog" src="/public/uploads/user/avatar.png">
          <div>
            <p class="nickname_blog">Fast join all friends</p>
            <p class="account_blog">{{ substr($user->phone ?? '********', 0, 2) }}****{{ substr($user->phone ?? '********', -2) }}</p>
          </div>
        </div>
        <div class="card_content">
          <div class="text_blog">{{ $proof->comment }}</div>
          <img class="blog_img" src="{{ asset($proof->photo) }}">
        </div>
        <div class="card_footer">
          <div class="reward_blog">Reward: {{ price($proof->reward_amount) }}</div>
          <div class="date_blog">{{ $proof->created_at->format('Y-m-d H:i:s') }}</div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Popup -->
  <div id="popup_overlay"></div>
  <div id="popup_rules">
    <span id="popup_close">&times;</span>
    <img src="/public/site/img/blog/rewards_icon.png" style="width:160px;height:160px;">
    <p>Share Withdrawal Screenshots for Cash Rewards</p>
    <p>Post a screenshot of your most recent successful withdrawal in the comments section, and once approved, you'll immediately receive a reward of 10-400</p>
    <a href="https://t.me/nano_dev" class="layui-btn btn_understand">I Understand</a>
  </div>

  <!-- Bottom Menu -->
  <div class="bottom_menu">
    <a href="/home" class="menu_item"><i class="fa-solid fa-house"></i><span>Home</span></a>
    <a href="/team" class="menu_item"><i class="fa-solid fa-users"></i><span>Team</span></a>
    <a href="/blog" class="menu_item active"><i class="fa-solid fa-blog"></i><span>Blog</span></a>
    <a href="/my" class="menu_item"><i class="fa-solid fa-user"></i><span>Mine</span></a>
  </div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const rulesBtn = document.querySelector('.btn_rules');
    const popup = document.getElementById('popup_rules');
    const popupClose = document.getElementById('popup_close');
    const overlay = document.getElementById('popup_overlay');

    rulesBtn.addEventListener('click', () => {
      popup.style.display = 'block';
      overlay.style.display = 'block';
    });

    popupClose.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });

    overlay.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    });
  });
</script>

</body>
</html>
