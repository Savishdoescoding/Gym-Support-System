<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Progress — Gym System</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/progress.css">
</head>
<body>
<div class="page-wrap">
  <aside class="sidebar">
    <div class="sb-logo"><a href="{{ route('dashboard') }}">GYM RAT</a><span>Fitness Tracking System</span></div>
    <nav class="sb-nav">
      <a class="sb-item" href="{{ route('discover') }}"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>Discover</a>
      <a class="sb-item active" href="{{ route('progress') }}"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Progress</a>
      <a class="sb-item" href="{{ route('exercises') }}"><svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>Exercises</a>
      <div class="sb-section">Account</div>
      <a class="sb-item" href="{{ route('settings') }}"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>Settings</a>
    </nav>
    <div class="sb-bottom"><div class="sb-user"><div class="sb-avatar">MB</div><div><div class="sb-uname">Marc Kristan Bautista</div><div class="sb-urole">Pro Member</div></div></div></div>
  </aside>
  <div class="main">
    <div class="topbar">
      <span class="topbar-title">Progress</span>
      <div class="topbar-right" id="topbar-right"></div>
    </div>
    <div class="tab-nav">
      <div class="tab {{ session('active_tab') === 'photos' ? '' : 'active' }}" onclick="switchTab('history', this)">History</div>
      <div class="tab {{ session('active_tab') === 'photos' ? 'active' : '' }}" onclick="switchTab('photos', this)">Progress Photos</div>
    </div>
    <div class="content">

      <div class="panel {{ session('active_tab') === 'photos' ? '' : 'active' }}" id="panel-history">
        <div class="cal-header">
          <div class="cal-month" id="cal-month-label">April 2026</div>
          <div class="cal-controls">
            <button class="cal-btn" onclick="changeMonth(-1)">&#8249;</button>
            <button class="cal-btn" onclick="changeMonth(1)">&#8250;</button>
            <button class="cal-today" onclick="goToday()">Today</button>
          </div>
        </div>
        <div class="cal-grid">
          <div class="cal-weekdays">
            <div class="cal-wd">Sun</div><div class="cal-wd">Mon</div><div class="cal-wd">Tue</div>
            <div class="cal-wd">Wed</div><div class="cal-wd">Thu</div><div class="cal-wd">Fri</div><div class="cal-wd">Sat</div>
          </div>
          <div class="cal-days" id="cal-days"></div>
        </div>
        <div class="cal-legend">
          <div class="leg"><div class="leg-dot dot-note"></div>Note</div>
          <div class="leg"><div class="leg-dot dot-photo"></div>Progress Photo</div>
        </div>
        <div class="day-detail" id="day-detail">
          <div class="dd-title" id="dd-title"></div>
          <div class="dd-section">
            <div class="dd-label">Note</div>
            <div class="dd-note" id="dd-note">No note for this day.</div>
          </div>
        </div>
      </div>

      <div class="panel {{ session('active_tab') === 'photos' ? 'active' : '' }}" id="panel-photos">
        <div class="upload-box" id="upload-box"
             ondragover="event.preventDefault(); this.classList.add('dragover')"
             ondragleave="this.classList.remove('dragover')"
             ondrop="handleDrop(event)">
          <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
          <p>Drag and drop your photo here</p>
          <span>or click to upload</span>
        </div>
        <div class="photos-grid">
         @forelse($photos as $photo)
<div class="photo-card">
  <div class="photo-placeholder" style="padding:0;overflow:hidden;">
    <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="{{ $photo->label }}" style="width:100%;height:100%;object-fit:cover;">
  </div>
  <div class="photo-info">
    <div class="photo-date">{{ \Carbon\Carbon::parse($photo->date)->format('F j, Y') }}</div>
    <div class="photo-tag">{{ $photo->label }}</div>
    <form action="{{ route('progress.photos.destroy', $photo->id) }}" method="POST" style="margin-top:8px;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn-delete" onclick="return confirm('Delete this photo?')">DELETE</button>
    </form>
  </div>
</div>
@empty
<p style="color:#888;">No photos yet.</p>
@endforelse
        </div>
      </div>

    </div>
  </div>
</div>

<input type="file" id="hidden-file-input" accept="image/*" style="display:none">

<div class="modal-overlay" id="photo-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Add Progress Photo</span>
      <button class="modal-close" onclick="closeModal('photo-modal')">✕</button>
    </div>
    <form id="photo-form" action="{{ route('progress.photos.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="photo" id="form-file-input" style="display:none" accept="image/*">
      <div class="field"><label>Date</label><input type="date" name="date" id="photo-date"></div>
      <div class="field"><label>Label / View</label>
        <select name="label">
          <option>Front view</option>
          <option>Side view</option>
          <option>Back view</option>
          <option>Other</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeModal('photo-modal')">Cancel</button>
        <button type="submit" class="btn-save">Save Photo</button>
      </div>
    </form>
  </div>
</div>

<script>
  const noteData = {
    '2026-04-06': 'Felt strong during bench press. Hit a new PR at 80kg × 5.',
    '2026-04-04': 'Rest day. Stretching and foam rolling. Weight down to 74.2kg.',
    '2026-04-02': 'Cardio — 5km in 28 mins. Legs tired but pushed through.',
    '2026-03-30': 'Great leg day. Squats, lunges, leg press.',
  };
  const photoData = ['2026-04-01', '2026-03-15'];
  let current = new Date(2026, 3, 1);

  function renderCalendar() {
    const year = current.getFullYear(), month = current.getMonth();
    document.getElementById('cal-month-label').textContent = current.toLocaleString('default', { month: 'long', year: 'numeric' });
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const daysInPrev = new Date(year, month, 0).getDate();
    const today = new Date();
    let html = '';
    for (let i = firstDay - 1; i >= 0; i--) html += `<div class="cal-day other-month"><div class="day-num">${daysInPrev - i}</div></div>`;
    for (let d = 1; d <= daysInMonth; d++) {
      const ds = `${year}-${String(month+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
      const isToday = today.getFullYear()===year && today.getMonth()===month && today.getDate()===d;
      let dots = '';
      if (noteData[ds]) dots += '<div class="dot dot-note"></div>';
      if (photoData.includes(ds)) dots += '<div class="dot dot-photo"></div>';
      html += `<div class="cal-day${isToday?' today':''}" onclick="showDayDetail('${ds}',${d})"><div class="day-num">${d}</div><div class="day-dots">${dots}</div></div>`;
    }
    const rem = (firstDay + daysInMonth) % 7;
    if (rem) for (let i = 1; i <= 7 - rem; i++) html += `<div class="cal-day other-month"><div class="day-num">${i}</div></div>`;
    document.getElementById('cal-days').innerHTML = html;
  }
  function changeMonth(dir) { current.setMonth(current.getMonth()+dir); renderCalendar(); document.getElementById('day-detail').classList.remove('open'); }
  function goToday() { current = new Date(); current.setDate(1); renderCalendar(); }
  function showDayDetail(ds, d) {
    const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    document.getElementById('dd-title').textContent = `${months[current.getMonth()]} ${d}, ${current.getFullYear()}`;
    document.getElementById('dd-note').textContent = noteData[ds] || 'No note for this day.';
    document.getElementById('day-detail').classList.add('open');
  }
  const tabActions = { history: '', photos: '' };
  function switchTab(name, el) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('panel-'+name).classList.add('active');
    document.getElementById('topbar-right').innerHTML = tabActions[name]||'';
  }
  function openModal(id)  { document.getElementById(id).classList.add('open'); }
  function closeModal(id) { document.getElementById(id).classList.remove('open'); }
  document.querySelectorAll('.modal-overlay').forEach(o => o.addEventListener('click', e => { if(e.target===o) o.classList.remove('open'); }));
  document.getElementById('photo-date').value = new Date().toISOString().split('T')[0];
  renderCalendar();

  // Click upload box to pick file
  document.getElementById('upload-box').addEventListener('click', function() {
    document.getElementById('hidden-file-input').click();
  });

  // File picked via click
  document.getElementById('hidden-file-input').addEventListener('change', function() {
    if (this.files[0]) {
      const dt = new DataTransfer();
      dt.items.add(this.files[0]);
      document.getElementById('form-file-input').files = dt.files;
      openModal('photo-modal');
    }
  });

  // File dropped
  function handleDrop(event) {
    event.preventDefault();
    document.getElementById('upload-box').classList.remove('dragover');
    const file = event.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
      const dt = new DataTransfer();
      dt.items.add(file);
      document.getElementById('hidden-file-input').files = dt.files;
      document.getElementById('form-file-input').files = dt.files;
      openModal('photo-modal');
    }
  }
</script>
</body>
</html>
