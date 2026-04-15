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
    <div class="sb-logo"><a href="../index.html">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="discover.html"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>Discover</a>
      <a class="sb-item" href="progress.html"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Progress</a>
      <a class="sb-item" href="exercises.html"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>Exercises</a>
      <div class="sb-section">Account</div>
      <a class="sb-item active" href="settings.html"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
    </nav>
    <div class="sb-bottom"><div class="sb-user"><div class="sb-avatar">MB</div><div><div class="sb-uname">Marc Kristan Bautista</div><div class="sb-urole">Pro Member</div></div></div></div>
  </aside>
  <div class="main">
    <div class="topbar"><span class="topbar-title">Settings</span></div>
    <div class="tab-nav">
      <div class="tab active" onclick="switchTab('account',this)">Account</div>
      <div class="tab" onclick="switchTab('profile',this)">Profile</div>
      <div class="tab" onclick="switchTab('privacy',this)">Privacy</div>
      <div class="tab" onclick="switchTab('data',this)">Data Controls</div>
    </div>
    <div class="content">

      
      <div class="panel active" id="panel-account">
        <div class="settings-group">
          <div class="sg-title">Account Information</div>
          <div class="setting-row">
            <span class="sr-label">Username</span>
            <div class="sr-right">
              <span class="sr-value" id="username-display">nxkoriazi</span>
              <input class="inline-edit" id="username-input" type="text" value="juandelacruz">
              <button class="btn-link" onclick="toggleEdit('username')"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>Change</button>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Email</span>
            <div class="sr-right">
              <div>
                <span class="sr-value">nxkoriazi@example.com</span>
                <div style="margin-top:4px"><span class="badge-unverified">Unverified</span> <button class="btn-link" style="display:inline-flex;font-size:12px">Resend Verification</button></div>
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
        </div>
        <div class="settings-group">
          <div class="sg-title">Upgrade Your Plan</div>
          <div class="membership-cards">
            <div class="mem-card" onclick="selectPlan(this)">
              <div class="mem-left"><div><div class="mem-plan">Basic Gym Rat<span class="mem-badge">BASIC</span></div><div class="mem-desc">Essential gym access and tracking tools</div></div></div>
              <div><div class="mem-price">₱799</div><div class="mem-period">/month</div></div>
            </div>
            <div class="mem-card selected" onclick="selectPlan(this)">
              <div class="mem-left"><div><div class="mem-plan">Pro Gym Rat<span class="mem-badge" style="background:var(--cyan)">PRO</span></div><div class="mem-desc">Full tracking suite + group classes</div></div></div>
              <div><div class="mem-price">₱1,499</div><div class="mem-period">/month</div></div>
            </div>
            <div class="mem-card" onclick="selectPlan(this)">
              <div class="mem-left"><div><div class="mem-plan">Elite Gym Rat <span class="mem-badge" style="background:#a78bfa">ELITE</span></div><div class="mem-desc">Unlimited access + personal trainer + nutrition</div></div></div>
              <div><div class="mem-price">₱2,499</div><div class="mem-period">/month</div></div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="panel" id="panel-profile">
        <div class="profile-photo-section">
          <div class="profile-avatar-lg">JD</div>
          <div class="profile-photo-actions">
            <button class="btn-outline">Upload Photo</button>
            <div class="photo-hint">JPG or PNG, max 2MB</div>
          </div>
        </div>
        <div class="settings-group">
          <div class="sg-title">Personal Information</div>
          <div class="setting-row">
            <span class="sr-label">Birthday</span>
            <input type="date" class="date-input" value="2000-05-15">
          </div>
          <div class="setting-row">
            <span class="sr-label">Gender</span>
            <div class="radio-group horizontal">
              <div class="radio-opt selected" onclick="selectRadio(this,'gender')"><div class="radio-dot checked"></div><div class="radio-text"><strong>Male</strong></div></div>
              <div class="radio-opt" onclick="selectRadio(this,'gender')"><div class="radio-dot"></div><div class="radio-text"><strong>Female</strong></div></div>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Unit System</span>
            <div class="radio-group">
              <div class="radio-opt" onclick="selectRadio(this,'unit')"><div class="radio-dot"></div><div class="radio-text"><strong>Imperial (inches / lbs)</strong><span>Use pounds and inches for measurements</span></div></div>
              <div class="radio-opt selected" onclick="selectRadio(this,'unit')"><div class="radio-dot checked"></div><div class="radio-text"><strong>Metric (cm / kg)</strong><span>Use kilograms and centimeters for measurements</span></div></div>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Fitness Level</span>
            <div class="radio-group">
              <div class="radio-opt" onclick="selectRadio(this,'level')"><div class="radio-dot"></div><div class="radio-text"><strong>Beginner</strong><span>New to lifting weights and unfamiliar with most exercises</span></div></div>
              <div class="radio-opt selected" onclick="selectRadio(this,'level')"><div class="radio-dot checked"></div><div class="radio-text"><strong>Intermediate</strong><span>Familiar with most exercises and comfortable working out</span></div></div>
              <div class="radio-opt" onclick="selectRadio(this,'level')"><div class="radio-dot"></div><div class="radio-text"><strong>Advanced</strong><span>Experienced athlete training consistently for 2+ years</span></div></div>
            </div>
          </div>
        </div>
        <button class="btn-save-settings">Save Profile</button>
      </div>

      
      <div class="panel" id="panel-privacy">
        <div class="settings-group">
          <div class="sg-title">Visibility</div>
          <div class="toggle-row"><div class="toggle-info"><strong>Public Profile</strong><span>Allow other members to view your profile and stats</span></div><label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label></div>
          <div class="toggle-row"><div class="toggle-info"><strong>Show in Member Directory</strong><span>Appear in the gym's member list</span></div><label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label></div>
          <div class="toggle-row"><div class="toggle-info"><strong>Show Progress Photos</strong><span>Let other members see your progress photo timeline</span></div><label class="toggle"><input type="checkbox"><span class="toggle-slider"></span></label></div>
        </div>
        <div class="settings-group">
          <div class="sg-title">Notifications</div>
          <div class="toggle-row"><div class="toggle-info"><strong>Email Notifications</strong><span>Receive emails about membership renewals and updates</span></div><label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label></div>
          <div class="toggle-row"><div class="toggle-info"><strong>Q&amp;A Reply Alerts</strong><span>Get notified when someone answers your questions</span></div><label class="toggle"><input type="checkbox" checked><span class="toggle-slider"></span></label></div>
        </div>
        <button class="btn-save-settings">Save Privacy Settings</button>
      </div>

      
      <div class="panel" id="panel-data">
        <div class="settings-group">
          <div class="sg-title">Your Data</div>
          <div class="setting-row">
            <span class="sr-label">Export Data</span>
            <div>
              <div style="font-size:13px;color:var(--muted);margin-bottom:8px;font-weight:300">Download a copy of all your gym data including check-ins, workouts, and body metrics.</div>
              <button class="btn-outline">Download My Data (.csv)</button>
            </div>
          </div>
          <div class="setting-row">
            <span class="sr-label">Workout History</span>
            <div>
              <div style="font-size:13px;color:var(--muted);margin-bottom:8px;font-weight:300">You have <strong style="color:var(--white)">148 logged sessions</strong> since joining.</div>
              <button class="btn-outline">View Full History</button>
            </div>
          </div>
        </div>
        <div class="settings-group">
          <div class="sg-title" style="color:var(--danger)">Danger Zone</div>
          <div class="danger-section">
            <div class="danger-title">Irreversible Actions</div>
            <div class="danger-row">
              <div><strong>Clear All Workout Data</strong><p>Permanently delete all your logged workouts and exercise history.</p></div>
              <button class="btn-danger">Clear Workouts</button>
            </div>
            <div class="danger-row">
              <div><strong>Delete Account</strong><p>Permanently delete your account and all associated data. This cannot be undone.</p></div>
              <button class="btn-danger">Delete Account</button>
            </div>
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

