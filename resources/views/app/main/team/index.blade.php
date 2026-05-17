<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Team</title>

  <!-- Layui + FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #f6f9f6;
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding-bottom: 80px;
    }

    /* HEADER */
    .common_header {
      position: sticky;
      top: 0;
      z-index: 99;
      background: #255542;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 14px 15px;
      font-size: 17px;
      font-weight: 600;
    }

    .common_header .btn {
      margin-right: 10px;
    }

    /* MAIN CONTAINER */
    .team_container {
      padding: 15px;
    }

    /* TOTAL COMMISSION CARD */
    .team_commission_card {
      background: #255542;
      border-radius: 14px;
      padding: 20px;
      color: #fff;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 15px;
    }

    .team_commission_card .desc {
      font-size: 14px;
      opacity: 0.9;
    }

    .team_commission_card .value {
      font-size: 22px;
      font-weight: bold;
      margin-top: 8px;
    }

    /* REFERRAL LINK CARD */
    .team_copy_card {
      background: #fff;
      border-radius: 14px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 15px;
    }

    .team_copy_desc {
      font-size: 14px;
      color: #333;
      margin-bottom: 10px;
    }

    .team_copy_link {
      background: #fff;
      border: 1px solid #cde6d8;
      padding: 10px;
      border-radius: 8px;
      font-size: 13px;
      word-break: break-all;
      color: #1a7f46;
      flex: 1;
    }

    .team_copy_btn {
      background: #255542;
      color: #fff;
      border-radius: 8px;
      padding: 8px 16px;
      font-size: 14px;
      cursor: pointer;
      margin-left: 10px;
      transition: 0.3s;
    }

    .team_copy_btn:hover {
      background: #15813f;
    }

    /* TEAM STATS */
    .team_total_card {
      background: #fff;
      border-radius: 14px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      text-align: center;
      margin-bottom: 15px;
    }

    .team_total_card .stat_grid {
      display: flex;
      justify-content: space-between;
      text-align: center;
    }

    .team_label {
      font-size: 13px;
      color: #777;
      margin-bottom: 6px;
    }

    .team_value {
      font-size: 16px;
      font-weight: 600;
      color: #255542;
    }

    /* LEVEL CARDS */
    .team_levels {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
      gap: 12px;
    }

    .team_member_card {
      background: #fff;
      border-radius: 16px;
      text-align: center;
      padding: 15px 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: 0.3s;
    }

    .team_member_card:hover {
      transform: translateY(-4px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .team_member_card img {
      width: 45px;
      height: 45px;
      margin-bottom: 10px;
    }

    .team_member_label {
      font-size: 12px;
      color: #666;
      margin-bottom: 2px;
    }

    .team_member_value {
      font-weight: 600;
      color: #255542;
      margin-bottom: 8px;
    }

    .member_detail_btn {
      display: inline-block;
      background: #255542;
      color: #fff;
      font-size: 12px;
      padding: 5px 10px;
      border-radius: 8px;
      text-decoration: none;
      margin-top: 5px;
      transition: 0.3s;
    }

    .member_detail_btn:hover {
      background: #255542;
    }

    /* FOOTER NAV */
    .footer_nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #fff;
      border-top: 1px solid #eee;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.05);
    }

    .footer_nav a {
      text-align: center;
      font-size: 13px;
      color: #777;
      text-decoration: none;
      transition: 0.3s;
    }

    .footer_nav a i {
      font-size: 18px;
      display: block;
      margin-bottom: 4px;
    }

    .footer_nav a.active {
      color: #1a7f46;
      font-weight: 600;
    }

    .footer_nav a.active i {
      color: #1a7f46;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <div class="common_header">
    <p class="btn"><i class="layui-icon layui-icon-left layui-font-20" onclick="history.back()"></i></p>
    Team
  </div>

  <div class="team_container">

    <!-- Total Commission -->
    <div class="team_commission_card">
      <div class="desc">Total Commission</div>
      <div class="value">
        {{ price(($levelTotalCommission1 ?? 0) + ($levelTotalCommission2 ?? 0) + ($levelTotalCommission3 ?? 0)) }}
      </div>
    </div>

    <!-- Referral Link -->
    <div class="team_copy_card">
      <div class="team_copy_desc">Share your referral link and start earning</div>
      <div style="display: flex; align-items: center;">
        <div class="team_copy_link">{{ url('register').'?ref='.auth()->user()->ref_id }}</div>
        <div class="team_copy_btn" onclick="copyLink('{{url('register').'?ref='.auth()->user()->ref_id}}')">Copy</div>
      </div>
    </div>

    <!-- Team Stats -->
    <div class="team_total_card">
      <div class="stat_grid">
        <div>
          <p class="team_label">Team Size</p>
          <p class="team_value">{{$team_size}}</p>
        </div>
        <div>
          <p class="team_label">Team Rate</p>
          <p class="team_value">30%</p>
        </div>
        <div>
          <p class="team_label">Total Income</p>
          <p class="team_value">{{ price(($levelTotalCommission1 ?? 0) + ($levelTotalCommission2 ?? 0) + ($levelTotalCommission3 ?? 0)) }}</p>
        </div>
      </div>
    </div>

    <!-- Level Cards -->
    <div class="team_levels">
      <div class="team_member_card">
        <img src="/public/site/img/team/lv1.png" alt="Level 1">
        <p class="team_member_label">Registered / Active</p>
        <p class="team_member_value">{{$first_level_users->count()}} / {{$first_level_users->where('investor', 1)->count()}}</p>
        <p class="team_member_label">Commission %</p>
        <p class="team_member_value">30%</p>
        <p class="team_member_label">Total Income</p>
        <p class="team_member_value">{{price($levelTotalCommission1)}}</p>
        <a href="/member/1" class="member_detail_btn">Details</a>
      </div>

      <div class="team_member_card">
        <img src="/public/site/img/team/lv2.png" alt="Level 2">
        <p class="team_member_label">Registered / Active</p>
        <p class="team_member_value">{{$second_level_users->count()}} / {{$second_level_users->where('investor', 1)->count()}}</p>
        <p class="team_member_label">Commission %</p>
        <p class="team_member_value">5%</p>
        <p class="team_member_label">Total Income</p>
        <p class="team_member_value">{{price($levelTotalCommission2)}}</p>
        <a href="/member/2" class="member_detail_btn">Details</a>
      </div>

      <div class="team_member_card">
        <img src="/public/site/img/team/lv3.png" alt="Level 3">
        <p class="team_member_label">Registered / Active</p>
        <p class="team_member_value">{{$third_level_users->count()}} / {{$third_level_users->where('investor', 1)->count()}}</p>
        <p class="team_member_label">Commission %</p>
        <p class="team_member_value">1%</p>
        <p class="team_member_label">Total Income</p>
        <p class="team_member_value">{{price($levelTotalCommission3)}}</p>
        <a href="/member/3" class="member_detail_btn">Details</a>
      </div>
    </div>
  </div>

  <!-- ✅ Modern Footer Menu -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="bottom_menu">
  <a href="/home" class="menu_item " onclick="setActiveMenu(this)">
    <i class="fa-solid fa-house"></i>
    <span>Home</span>
  </a>

  <a href="/team" class="menu_item active" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-users"></i>
    <span>Team</span>
  </a>

  <a href="/blog" class="menu_item" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-blog"></i>
    <span>Blog</span>
  </a>

  <a href="/my" class="menu_item" onclick="setActiveMenu(this)">
    <i class="fa-solid fa-user"></i>
    <span>Mine</span>
  </a>
</div>

<style>
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

<script>
function setActiveMenu(el) {
  document.querySelectorAll('.bottom_menu .menu_item').forEach(item => {
    item.classList.remove('active');
  });
  el.classList.add('active');
}
</script>

  <!-- COPY FUNCTION -->
  <script>
    function copyLink(text) {
      const input = document.createElement("input");
      input.value = text;
      document.body.appendChild(input);
      input.select();
      document.execCommand("copy");
      input.remove();
      alert("Copied successfully!");
    }
  </script>
</body>
</html>
