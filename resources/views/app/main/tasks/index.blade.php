<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tasks</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/layui/2.5.7/css/layui.min.css">
<style>
/* ===== Body ===== */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #ffffff;
}

/* ===== Fixed Header ===== */
.header-fixed {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: #255542;
    display: flex;
    align-items: center;
    padding: 0 15px;
    z-index: 999;
    color: #fff;
}
.header-fixed a {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}
.header-fixed a i {
    font-size: 20px;
    margin-right: 8px;
}

/* ===== Page Container ===== */
.page-container {
    padding: 80px 15px 20px 15px; /* top padding for fixed header */
}

/* ===== Reward Card ===== */
.card-reward {
    background: #255542;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    color:white;
}
.card-reward-header {
    display: flex;
    align-items: center;
    font-weight: 700;
    font-size: 18px;
}
.card-reward-header img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}
.card-reward-desc {
    margin-top: 10px;
    font-size: 14px;
    line-height: 22px;
}

/* ===== Referral Box ===== */
.box-referral {
    background: #255542;
    padding: 15px;
    border-radius: 12px;
    margin-top: 15px;
    color: #fff;
    font-weight: 500;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.box-referral .ref-link {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-weight: bold;
    max-width: 70%;
}
.box-referral .copy-btn {
    cursor: pointer;
    background: #fff;
    color: #255542;
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: bold;
}

/* ===== Task Card ===== */
.card-task {
    background: #fff;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.card-task .task-title {
    font-size: 16px;
    color: #333;
    margin-bottom: 5px;
}
.card-task .task-reward {
    font-size: 16px;
    color: #255542;
    font-weight: 700;
    margin-bottom: 10px;
}
.card-task .task-progress {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.card-task .task-progress-bar {
    flex: 1;
    height: 10px;
    border-radius: 5px;
    background: #f0f0f0;
    margin-right: 10px;
}
.card-task .task-progress-bar-inner {
    height: 10px;
    border-radius: 5px;
    background: linear-gradient(90deg, #FFB244 0%, #FFB244 100%);
}

/* ===== Buttons ===== */
.task-btn {
    font-size: 12px;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    margin-top: 10px;
}
.task-btn.claimed { background: #00c48f; color: #fff; }
.task-btn.claim-now { background: #ffb029; color: #fff; }
.task-btn.not-ready { background: #ccc; color: #fff; cursor: not-allowed; }

/* ===== Responsive ===== */
@media screen and (max-width:480px){
    .card-task, .card-reward {
        padding: 15px;
    }
    .box-referral {
        flex-direction: column;
        align-items: flex-start;
    }
    .box-referral .ref-link {
        max-width: 100%;
        margin-bottom: 8px;
    }
}
</style>
</head>
<body>

<!-- Fixed Header -->
<div class="header-fixed">
    <a href="javascript:history.back()"><i class="layui-icon layui-icon-left"></i> Tasks</a>
</div>

<!-- Page Container -->
<div class="page-container">

    <!-- Reward Section -->
    <div class="card-reward">
        <div class="card-reward-header">
            <img src="/public/site/img/tasks/reward_icon.png" alt="Reward Icon">
            Rewards Description
        </div>
        <p class="card-reward-desc">
            When your friends upgrade to VIP1 or higher, you'll receive a reward of <strong>50</strong>
        </p>

        <!-- Referral -->
        <div class="box-referral">
            <div class="ref-link">{{ url('register').'?ref='.auth()->user()->ref_id }}</div>
            <div class="copy-btn" onclick="copyLink('{{ url('register').'?ref='.auth()->user()->ref_id }}')">Copy</div>
        </div>
    </div>

    <!-- Task List -->
    @php
        $referUsers = \App\Models\User::where('ref_by', auth()->user()->ref_id)->where('investor',1)->count();
    @endphp

    @foreach(\App\Models\Task::all() as $task)
        @php
            $apply = \App\Models\TaskRequest::where('task_id', $task->id)
                        ->where('user_id', auth()->id())
                        ->where('status','!=','rejected')
                        ->first();
            $currentCount = min($referUsers, $task->team_size);
            $progress = min(100, ($currentCount/$task->team_size)*100);
            $isClaimable = !$apply && $currentCount >= $task->team_size;
        @endphp

        <div class="card-task">
            <div class="task-title">Require: Invite <strong>{{ $task->team_size }}</strong> people</div>
            <div class="task-reward">Rewards: {{ price($task->bonus) }}</div>
            <div class="task-progress">
                <div class="task-progress-bar">
                    <div class="task-progress-bar-inner" style="width: {{ $progress }}%;"></div>
                </div>
                <div>{{ $currentCount }} / {{ $task->team_size }}</div>
            </div>
            @if($apply)
                <button class="task-btn claimed" disabled>Claimed</button>
            @elseif($isClaimable)
                <a href="{{ route('user.received.reward',$task->id) }}" class="task-btn claim-now">Claim Now</a>
            @else
                <button class="task-btn not-ready" disabled>Not Ready</button>
            @endif
        </div>
    @endforeach

</div>

<!-- Copy Function -->
<script>
function copyLink(text) {
    const input = document.createElement('input');
    document.body.appendChild(input);
    input.value = text;
    input.select();
    document.execCommand('copy');
    input.remove();
    alert('Copied successfully!');
}
</script>

</body>
</html>
