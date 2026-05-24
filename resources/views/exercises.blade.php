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
    <div class="sb-logo"><a href="{{ route('dashboard') }}">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="{{ route('discover') }}"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>Discover</a>
      <a class="sb-item" href="{{ route('progress') }}"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Progress</a>
      <a class="sb-item active" href="{{ route('exercises') }}"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>Exercises</a>
      <a class="sb-item" href="{{ route('recommendations') }}">
            <svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Recommendations
        </a>
      <div class="sb-section">Account</div>
      <a class="sb-item" href="{{ route('settings') }}"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sb-item">
            <svg viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
        </button>
    </form>
    </nav>
    <div class="sb-bottom"><div class="sb-user"><div class="sb-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div><div class="sb-uname">{{ Auth::user()->name }}</div>  </aside>
  <div class="main">
    <div class="topbar">
      <span class="topbar-title">Exercises</span>
      <div class="topbar-right" id="topbar-right"></div>
    </div>
    <div class="tab-nav">
      <div class="tab active" onclick="switchTab('custom', this)">Today's Log</div>
      <div class="tab" onclick="switchTab('database', this)">Exercise Database</div>
    </div>
    <div class="content">


<div class="panel active" id="panel-custom">
    <div id="workout-list" style="display:flex; flex-direction:column; gap:8px;"></div>
    <div id="empty-log" style="color:rgba(255,255,255,0.3); font-size:13px; margin-top:20px;">
      No exercises added yet today. Go to Exercise Database to add some.
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
        </div>

        <div class="db-grid" id="db-grid">
        @forelse($exercises as $exercise)
        <div class="db-row"
            data-muscle="{{ strtolower($exercise->muscle) }}"
            data-equipment="{{ strtolower($exercise->equipment) }}">
            <div class="db-row-left">
            <div class="db-ico">
                <svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M3 10h3.5M17.5 10H21"/></svg>
            </div>
            <div>
                <div class="db-name">{{ $exercise->name }}</div>
                <div class="db-group">{{ $exercise->muscle }} · {{ $exercise->equipment }}</div>
            </div>
            </div>
            <button class="btn-add-ex" onclick="addToProgress('{{ $exercise->name }}', '{{ $exercise->muscle }}', '{{ $exercise->equipment }}', this)">+ Add</button>
        </div>
        @empty
        <p style="color:#888;">No exercises found.</p>
        @endforelse
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
   const actions = { custom: '', database: '' };
    document.getElementById('topbar-right').innerHTML = actions[name]||'';
  }
// Search
document.querySelector('#panel-database .search-box input').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('.db-row').forEach(row => {
        const name = row.querySelector('.db-name').textContent.toLowerCase();
        row.style.display = name.includes(query) ? '' : 'none';
    });
});

// Equipment filter
document.querySelector('.filter-select').addEventListener('change', function() {
    const equipment = this.value.toLowerCase().replace(' ', '-');
    document.querySelectorAll('.db-row').forEach(row => {
        if (this.value === 'All Equipment') {
            row.style.display = '';
        } else {
            row.style.display = row.dataset.equipment === equipment ? '' : 'none';
        }
    });
});

// Muscle filter pills
function togglePill(el) {
    document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    const muscle = el.textContent.toLowerCase();

    const muscleMap = {
        'all': [],
        'chest': ['chest'],
        'back': ['middle back', 'lower back', 'lats', 'traps'],
        'shoulders': ['shoulders'],
        'arms': ['biceps', 'triceps', 'forearms'],
        'legs': ['quadriceps', 'hamstrings', 'calves', 'glutes', 'adductors', 'abductors'],
        'core': ['abdominals'],
        'cardio': ['cardiovascular system']
    };

    document.querySelectorAll('.db-row').forEach(row => {
        if (muscle === 'all') {
            row.style.display = '';
        } else {
            const rowMuscle = row.dataset.muscle;
            row.style.display = muscleMap[muscle]?.includes(rowMuscle) ? '' : 'none';
        }
    });
}
  function openModal(id)  { document.getElementById(id).classList.add('open'); }
  function closeModal(id) { document.getElementById(id).classList.remove('open'); }
  document.querySelectorAll('.modal-overlay').forEach(o=>o.addEventListener('click',e=>{if(e.target===o)o.classList.remove('open');}));
  function addToProgress(name, muscle, equipment, btn) {
    fetch('{{ route("workout.log.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ exercise_name: name, muscle: muscle, equipment: equipment })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            btn.textContent = '✓ Added';
            btn.disabled = true;
            btn.style.opacity = '0.6';
            addToWorkoutList(name, muscle, equipment); // 👈 add this
            const t = document.getElementById('toast');
            t.textContent = `"${name}" added to your progress log`;
            t.style.display = 'block';
            setTimeout(() => t.style.display = 'none', 2500);
        }
    });
}

function addToWorkoutList(name, muscle, equipment) {
    const list = document.getElementById('workout-list');
    document.getElementById('empty-log').style.display = 'none'; // hide empty msg
    const item = document.createElement('div');
    item.style.cssText = 'display:flex; align-items:center; gap:10px; padding:10px 14px; background:#1c1c1c; border:1px solid rgba(255,255,255,0.08);';
    item.innerHTML = `<span style="color:#00bcd4;">✅</span> <span style="font-size:13px;">${name}</span> <span style="font-size:11px; color:rgba(255,255,255,0.4);">${muscle} · ${equipment}</span>`;
    list.appendChild(item);
}

// Load today's workout on page load
window.addEventListener('load', function() {
    fetch('{{ route("workout.log.today") }}')
    .then(res => res.json())
    .then(logs => {
        logs.forEach(log => addToWorkoutList(log.exercise_name, log.muscle ?? '', log.equipment ?? ''));
    });
});
</script>
</body>
</html>
