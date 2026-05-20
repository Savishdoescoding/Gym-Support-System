<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Settings — Gym System</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/settings.css">
</head>
<body>
<div class="page-wrap">
  <aside class="sidebar">
    <div class="sb-logo"><a href="{{ route('dashboard') }}">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="{{ route('discover') }}"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>Discover</a>
      <a class="sb-item" href="{{ route('progress') }}"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Progress</a>
      <a class="sb-item" href="{{ route('exercises') }}"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>Exercises</a>
      <div class="sb-section">Account</div>
      <a class="sb-item active" href="{{ route('settings') }}"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sb-item">
            <svg viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
        </button>
    </form>
    </nav>
    <div class="sb-bottom"><div class="sb-user"><div class="sb-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div><div><div class="sb-uname">{{ Auth::user()->name }}</div></div></div></div>
  </aside>
  <div class="main">
    <div class="topbar"><span class="topbar-title">Settings</span></div>
    <div class="tab-nav">
      <div class="tab active" onclick="switchTab('account',this)">Account</div>
    </div>
    <div class="content">


      <div class="panel active" id="panel-account">
        <div class="settings-group">
          <div class="sg-title">Account Information</div>
          <div class="setting-row">
            <span class="sr-label">Username</span>
            <div class="sr-right">
              <span class="sr-value" id="username-display">{{ Auth::user()->username }}</span>
              <input class="inline-edit" id="username-input" type="text" value="{{ Auth::user()->username }}">
              <button class="btn-link" onclick="toggleEdit('username')"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Change</button>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Email</span>
            <div class="sr-right">
              <div>
                <span class="sr-value">{{ Auth::user()->email }}</span>
                </div>
              <button class="btn-link"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Change</button>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Password</span>
            <div class="sr-right">
              <span class="sr-value">••••••••••••</span>
              <button class="btn-link"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Change</button>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Account Type</span>
            <div class="sr-right"><span class="badge-type">Pro</span></div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Google Calendar</span>
            <div class="sr-right">
                @if(Auth::user()->google_access_token)
                    <span class="badge-type" style="background:green">Connected</span>
                @else
                    <a href="{{ route('google.calendar.connect') }}" class="btn-link">Connect Google Calendar</a>
                @endif

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  function switchTab(name, el) {
    document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
    document.querySelectorAll('.panel').forEach(p=>p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('panel-'+name).classList.add('active');
  }
  function selectPlan(el) { document.querySelectorAll('.mem-card').forEach(c=>c.classList.remove('selected')); el.classList.add('selected'); }
  function selectRadio(el, group) {
    el.closest('.radio-group').querySelectorAll('.radio-opt').forEach(o=>{ o.classList.remove('selected'); const d=o.querySelector('.radio-dot'); d.classList.remove('checked'); d.innerHTML=''; });
    el.classList.add('selected'); const dot=el.querySelector('.radio-dot'); dot.classList.add('checked'); dot.innerHTML='';
  }
  function toggleEdit(field) {
    const disp=document.getElementById(field+'-display'), inp=document.getElementById(field+'-input');
    const shown = inp.style.display==='inline-block';
    inp.style.display = shown?'none':'inline-block';
    disp.style.display = shown?'inline':'none';
    if (!shown) { inp.focus(); }
    else { disp.textContent = inp.value; }
  }
</script>
</body>
</html>
