<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Exercises — Gym System</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/exercises.css">
</head>
<body>
<div class="page-wrap">
  <aside class="sidebar">
    <div class="sb-logo"><a href="../index.html">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="discover.html"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>Discover</a>
      <a class="sb-item" href="progress.html"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Progress</a>
      <a class="sb-item active" href="exercises.html"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>Exercises</a>
      <div class="sb-section">Account</div>
      <a class="sb-item" href="settings.html"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
    </nav>
    <div class="sb-bottom"><div class="sb-user"><div class="sb-avatar">MB</div><div><div class="sb-uname">Marc Kristan Bautista</div><div class="sb-urole">Pro Member</div></div></div></div>
  </aside>
  <div class="main">
    <div class="topbar">
      <span class="topbar-title">Exercises</span>
      <div class="topbar-right" id="topbar-right">
        <button class="btn-action" onclick="openModal('create-modal')">+ Create Custom Exercise</button>
      </div>
    </div>
    <div class="tab-nav">
      <div class="tab active" onclick="switchTab('custom', this)">Custom Exercises</div>
      <div class="tab" onclick="switchTab('database', this)">Exercise Database</div>
    </div>
    <div class="content">

      
      <div class="panel active" id="panel-custom">
        <div class="search-row">
          <div class="search-box">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            <input type="text" placeholder="Search your exercises...">
          </div>
        </div>
        <div class="ex-grid">
          <div class="ex-card">
            <div class="ex-thumb">
              <svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>
              <button class="ex-menu">⋯</button>
            </div>
            <div class="ex-info">
              <div class="ex-name">Resistance Band Pull</div>
              <div class="ex-meta">Back / Resistance Band</div>
              <div class="ex-muscle">Back</div>
            </div>
          </div>
          <div class="ex-card ex-card-add" onclick="openModal('create-modal')">
            <div class="ex-card-add-inner">
              <div class="ex-card-add-icon">+</div>
              <div class="ex-card-add-label">Create New</div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="panel" id="panel-database">
        <div class="search-row">
          <div class="search-box">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            <input type="text" placeholder="Search exercises...">
          </div>
          <select class="filter-select">
            <option>All Equipment</option><option>Barbell</option><option>Dumbbell</option>
            <option>Body Weight</option><option>Cable</option><option>Machine</option>
          </select>
        </div>
        <div class="db-filters">
          <div class="filter-pill active" onclick="togglePill(this)">All</div>
          <div class="filter-pill" onclick="togglePill(this)">Chest</div>
          <div class="filter-pill" onclick="togglePill(this)">Back</div>
          <div class="filter-pill" onclick="togglePill(this)">Shoulders</div>
          <div class="filter-pill" onclick="togglePill(this)">Arms</div>
          <div class="filter-pill" onclick="togglePill(this)">Legs</div>
          <div class="filter-pill" onclick="togglePill(this)">Core</div>
          <div class="filter-pill" onclick="togglePill(this)">Cardio</div>
        </div>
        <div class="db-grid">
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M3 10h3.5M17.5 10H21"/></svg></div><div><div class="db-name">Bench Press</div><div class="db-group">Chest · Barbell</div></div></div><button class="btn-add-ex" onclick="addToProgress('Bench Press')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M3 14h3.5M17.5 14H21"/></svg></div><div><div class="db-name">Deadlift</div><div class="db-group">Back · Barbell</div></div></div><button class="btn-add-ex" onclick="addToProgress('Deadlift')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div><div><div class="db-name">Pull-up</div><div class="db-group">Back · Body Weight</div></div></div><button class="btn-add-ex" onclick="addToProgress('Pull-up')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/></svg></div><div><div class="db-name">Squat</div><div class="db-group">Legs · Barbell</div></div></div><button class="btn-add-ex" onclick="addToProgress('Squat')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="db-name">Overhead Press</div><div class="db-group">Shoulders · Barbell</div></div></div><button class="btn-add-ex" onclick="addToProgress('Overhead Press')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67"/></svg></div><div><div class="db-name">Dumbbell Curl</div><div class="db-group">Arms · Dumbbell</div></div></div><button class="btn-add-ex" onclick="addToProgress('Dumbbell Curl')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><path d="M3 3h18v18H3z"/></svg></div><div><div class="db-name">Plank</div><div class="db-group">Core · Body Weight</div></div></div><button class="btn-add-ex" onclick="addToProgress('Plank')">+ Add</button></div>
          <div class="db-row"><div class="db-row-left"><div class="db-ico"><svg viewBox="0 0 24 24"><polyline points="13 17 18 12 13 7"/><polyline points="6 17 11 12 6 7"/></svg></div><div><div class="db-name">Treadmill Run</div><div class="db-group">Cardio · Machine</div></div></div><button class="btn-add-ex" onclick="addToProgress('Treadmill Run')">+ Add</button></div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="toast" id="toast"></div>


<div class="modal-overlay" id="create-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Create Custom Exercise</span>
      <button class="modal-close" onclick="closeModal('create-modal')">✕</button>
    </div>
    <div class="modal-body-row">
      <div class="muscle-diagram">
        <svg viewBox="0 0 80 120">
          <ellipse cx="40" cy="12" rx="12" ry="12" stroke-width="1.5"/>
          <rect x="28" y="26" width="24" height="30" rx="4" stroke-width="1.5"/>
          <rect x="10" y="28" width="16" height="22" rx="3" stroke-width="1.5"/>
          <rect x="54" y="28" width="16" height="22" rx="3" stroke-width="1.5"/>
          <rect x="30" y="58" width="10" height="28" rx="3" stroke-width="1.5"/>
          <rect x="42" y="58" width="10" height="28" rx="3" stroke-width="1.5"/>
          <rect x="28" y="88" width="10" height="28" rx="3" stroke-width="1.5"/>
          <rect x="42" y="88" width="10" height="28" rx="3" stroke-width="1.5"/>
        </svg>
      </div>
      <div>
        <div class="field"><label>Exercise Title</label><input type="text" placeholder="e.g. Cable Fly Variation"></div>
        <div class="field"><label>Muscle Group</label>
          <select><option>Chest</option><option>Back</option><option>Shoulders</option><option>Arms</option><option>Legs</option><option>Core</option><option>Other/Misc</option></select>
        </div>
        <div class="field"><label>Equipment</label>
          <select><option>Body Weight</option><option>Barbell</option><option>Dumbbell</option><option>Cable</option><option>Machine</option><option>Resistance Band</option><option>Other</option></select>
        </div>
      </div>
    </div>
    <div class="field"><label>Recording Type</label>
      <select><option>Weight and Reps</option><option>Time (Duration)</option><option>Distance</option><option>Reps only</option></select>
    </div>
    <div class="field"><label>Exercise Instructions (optional)</label><textarea rows="3" placeholder="Describe how to perform this exercise..."></textarea></div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('create-modal')">Cancel</button>
      <button class="btn-save" onclick="closeModal('create-modal')">Save Exercise</button>
    </div>
  </div>
</div>

<script>
  function switchTab(name, el) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('panel-'+name).classList.add('active');
    const actions = { custom: '<button class="btn-action" onclick="openModal(\'create-modal\')">+ Create Custom Exercise</button>', database: '' };
    document.getElementById('topbar-right').innerHTML = actions[name]||'';
  }
  function togglePill(el) { document.querySelectorAll('.filter-pill').forEach(p=>p.classList.remove('active')); el.classList.add('active'); }
  function openModal(id)  { document.getElementById(id).classList.add('open'); }
  function closeModal(id) { document.getElementById(id).classList.remove('open'); }
  document.querySelectorAll('.modal-overlay').forEach(o=>o.addEventListener('click',e=>{if(e.target===o)o.classList.remove('open');}));
  function addToProgress(name) {
    const t = document.getElementById('toast');
    t.textContent = `"${name}" added to your progress log`;
    t.style.display = 'block';
    setTimeout(()=>t.style.display='none', 2500);
  }
</script>
</body>
</html>

