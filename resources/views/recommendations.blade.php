<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Recommendations — Gym System</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/exercises.css">
</head>
<body>
<div class="page-wrap">
  <aside class="sidebar">
    <div class="sb-logo"><a href="{{ route('dashboard') }}">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="{{ route('discover') }}">Discover</a>
      <a class="sb-item" href="{{ route('progress') }}">Progress</a>
      <a class="sb-item" href="{{ route('exercises') }}">Exercises</a>
      <a class="sb-item active" href="{{ route('recommendations') }}">Recommendations</a>
      <div class="sb-section">Account</div>
      <a class="sb-item" href="{{ route('settings') }}">Settings</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sb-item">Logout</button>
      </form>
    </nav>
    <div class="sb-bottom">
      <div class="sb-user">
        <div class="sb-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        <div><div class="sb-uname">{{ Auth::user()->name }}</div></div>
      </div>
    </div>
  </aside>

  <div class="main">
    <div class="topbar"><span class="topbar-title">Your Recommendations</span></div>

    @if(session('status'))
      <div style="background:#d4edda;color:#155724;padding:12px 20px;margin:16px;border-radius:8px;">
        {{ session('status') }}
      </div>
    @endif

    <div class="content" style="padding:24px;">

      {{-- User Goal Summary --}}
      <div style="background:#1e1e2e;border-radius:12px;padding:20px;margin-bottom:24px;color:#fff;">
        <h3 style="margin:0 0 8px;">Goal: <span style="color:#a78bfa;">{{ ucfirst($user->goal) }} Weight</span></h3>
        <p style="margin:0;opacity:.7;">
          Current: <strong>{{ $user->weight }} kg</strong> &nbsp;→&nbsp;
          Target: <strong>{{ $user->target_weight }} kg</strong>
        </p>
      </div>

      {{-- Recommended Exercises --}}
      <h3 style="margin-bottom:16px;">Recommended Exercises</h3>
      <div class="exercise-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px;margin-bottom:32px;">
        @foreach($exercises as $exercise)
          <div style="background:#1e1e2e;border-radius:12px;padding:20px;color:#fff;">
            <div style="font-weight:600;font-size:15px;margin-bottom:6px;">{{ $exercise['name'] }}</div>
            <div style="font-size:12px;opacity:.6;margin-bottom:4px;">
              Category: {{ ucfirst($exercise['category']) }} &nbsp;|&nbsp; Level: {{ ucfirst($exercise['level']) }}
            </div>
            <div style="font-size:12px;opacity:.6;">
              Equipment: {{ ucfirst($exercise['equipment']) }}
            </div>
          </div>
        @endforeach
      </div>

      {{-- Save to Calendar Form --}}
      <div style="background:#1e1e2e;border-radius:12px;padding:24px;color:#fff;">
        <h3 style="margin:0 0 16px;">📅 Schedule This Workout</h3>
        <form method="POST" action="{{ route('recommendations.calendar') }}">
          @csrf

          @foreach($exercises as $exercise)
            <input type="hidden" name="exercises[]" value="{{ $exercise['name'] }}">
          @endforeach

          <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;">
            <div>
              <label style="font-size:13px;opacity:.7;display:block;margin-bottom:6px;">Date</label>
              <input type="date" name="start_date" required
                     style="width:100%;padding:8px 12px;border-radius:8px;border:1px solid #333;background:#2a2a3e;color:#fff;">
            </div>
            <div>
              <label style="font-size:13px;opacity:.7;display:block;margin-bottom:6px;">Start Time</label>
              <input type="time" name="start_time" required
                     style="width:100%;padding:8px 12px;border-radius:8px;border:1px solid #333;background:#2a2a3e;color:#fff;">
            </div>
            <div>
              <label style="font-size:13px;opacity:.7;display:block;margin-bottom:6px;">End Time</label>
              <input type="time" name="end_time" required
                     style="width:100%;padding:8px 12px;border-radius:8px;border:1px solid #333;background:#2a2a3e;color:#fff;">
            </div>
          </div>

          <button type="submit"
                  style="margin-top:20px;padding:10px 24px;background:#a78bfa;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:14px;">
            Save to Google Calendar & Send Reminder
          </button>
        </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>
