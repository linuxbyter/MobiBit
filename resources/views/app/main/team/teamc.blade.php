<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title>Team 3 Member</title>

  <!-- Layui + Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #f8f8f8;
      color: #fff;
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
    }

    .common_header {
      display: flex;
      align-items: center;
      justify-content: start;
      padding: 15px 20px;
      font-size: 18px;
      font-weight: 600;
            background: #255542;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }

    .common_header a {
      color: #fff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .team_main {
      padding: 25px 15px;
    }

    /* Stat cards */
    .common_card {
            background: #255542;
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 16px;
      padding: 15px;
      backdrop-filter: blur(6px);
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      margin-bottom: 20px;
    }

    .team_value {
      font-size: 26px;
      font-weight: 700;
      color: #fff;
      margin: 0;
    }

    .team_label {
      color: #fff;
      font-size: 14px;
      margin-top: 4px;
    }

    /* Member list */
    .member_card {
      display: flex;
      align-items: center;
            background: #255542;
      border-radius: 14px;
      padding: 12px 16px;
      margin-bottom: 12px;
      transition: all 0.3s ease;
    }

    .member_card:hover {
            background: #255542;
      transform: translateY(-2px);
    }

    .member_avatar {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      border: 2px solid #00ff99;
      margin-right: 12px;
    }

    .member_info_title {
      font-weight: 600;
      font-size: 16px;
      margin: 0;
    }

    .member_info_desc {
      font-size: 13px;
      color: #b0c8b7;
      margin-top: 2px;
    }

    /* Floating icons */
    #service {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      z-index: 99;
    }

    #service a {
      width: 42px;
      height: 42px;
      background: #1c4030;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
      transition: 0.3s;
      border: 1px solid rgba(255,255,255,0.1);
    }

    #service a:hover {
      background: #00ff99;
      transform: scale(1.1);
    }

    #service a i {
      color: #fff;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="common_header">
    <a href="javascript:history.back(-1)">
      <i class="fa-solid fa-arrow-left"></i> Team 3 Member
    </a>
  </div>

  <!-- Content -->
  <div class="team_main">
    <!-- Stats -->
    <div class="common_card">
      <div class="layui-row">
        <div class="layui-col-xs6">
          <p class="team_value">{{$third_level_users->count()}}</p>
          <p class="team_label">People Invited</p>
        </div>
        <div class="layui-col-xs6">
          <p class="team_value">{{$third_level_users->where('investor', 1)->count()}}</p>
          <p class="team_label">Active Members</p>
        </div>
      </div>
    </div>

    <!-- Members -->
    @foreach ($third_level_users as $user)
      <div class="member_card">
        <img class="member_avatar" src="{{setting('logo')}}">
        <div>
          <p class="member_info_title">{{ substr($user->phone, 0, 2) }}******{{ substr($user->phone, -2) }}</p>
          <p class="member_info_desc">Joined: {{ $user->created_at }}</p>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Floating Buttons -->
  <div id="service">
    <a href="https://t.me/nano_dev"><i class="fa-brands fa-telegram"></i></a>
    <a href="/orders"><i class="fa-solid fa-list"></i></a>
    <a href="/help"><i class="fa-solid fa-circle-question"></i></a>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/layui.min.js"></script>
</body>
</html>
