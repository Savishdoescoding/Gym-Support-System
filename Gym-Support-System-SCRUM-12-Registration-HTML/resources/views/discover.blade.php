<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Discover — Gym System</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/discover.css">
</head>
<body>

<div class="page-wrap">

  
  <aside class="sidebar">
    <div class="sb-logo">
      <a href="../index.html">GYM RAT</a>
      <span>Fitness Tracking System</span>
    </div>
    <nav class="sb-nav">
      <a class="sb-item active" href="discover.html">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35M11 8l2 3-2 3-2-3 2-3z"/></svg>
        Discover
      </a>
      <a class="sb-item" href="progress.html">
        <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        Progress
      </a>
      <a class="sb-item" href="exercises.html">
        <svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>
        Exercises
      </a>
      <div class="sb-section">Account</div>
      <a class="sb-item" href="settings.html">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        Settings
      </a>
    </nav>
    <div class="sb-bottom">
      <div class="sb-user">
        <div class="sb-avatar">MB</div>
        <div>
          <div class="sb-uname">Marc Kristan Bautista</div>
          <div class="sb-urole">Pro Member</div>
        </div>
      </div>
    </div>
  </aside>

  
  <div class="main">
    <div class="topbar">
      <span class="topbar-title">Discover</span>
      <div class="topbar-right" id="topbar-right">
        <button class="btn-action" onclick="openModal('note-modal')">+ Write a Note</button>
      </div>
    </div>

    <div class="tab-nav">
      <div class="tab active" onclick="switchTab('notes', this)">My Notes</div>
      <div class="tab" onclick="switchTab('qa', this)">Q &amp; A</div>
      <div class="tab" onclick="switchTab('feed', this)">Feed</div>
    </div>

    <div class="content">

      
      <div class="panel active" id="panel-notes">
        <div class="notes-grid">
          <div class="note-card">
            <div class="note-date">April 6, 2026</div>
            <div class="note-body">Felt strong today during bench press. Hit a new PR at 80kg × 5. Need to focus more on lower back mobility next session.</div>
            <span class="note-tag">Workout</span>
          </div>
          <div class="note-card">
            <div class="note-date">April 4, 2026</div>
            <div class="note-body">Rest day. Stretching and foam rolling for 30 mins. Weight is down to 74.2kg — good trend this week.</div>
            <span class="note-tag">Recovery</span>
          </div>
          <div class="note-card">
            <div class="note-date">April 2, 2026</div>
            <div class="note-body">Cardio session — 5km run in 28 mins. Legs felt tired from leg day but pushed through. Sleep has been good lately.</div>
            <span class="note-tag">Cardio</span>
          </div>
        </div>
      </div>

      
      <div class="panel" id="panel-qa">
        <div class="qa-list">
          <div class="qa-card">
            <div class="qa-meta">
              <div class="qa-avatar">MR</div>
              <span class="qa-author">Marco R.</span>
              <span class="badge-q">Question</span>
              <span class="qa-time">2 hours ago</span>
            </div>
            <div class="qa-question">What's the best way to track progressive overload for beginners?</div>
            <div class="qa-preview">I've been training for 3 months and not sure how to properly log my improvements without a coach...</div>
            <div class="qa-footer">
              <span class="qa-stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>4 answers</span>
              <span class="qa-stat"><svg viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3z"/></svg>12 helpful</span>
            </div>
          </div>
          <div class="qa-card">
            <div class="qa-meta">
              <div class="qa-avatar">AT</div>
              <span class="qa-author">Aisha T.</span>
              <span class="badge-q">Question</span>
              <span class="qa-time">Yesterday</span>
            </div>
            <div class="qa-question">How often should I update my body metrics for accurate BMI tracking?</div>
            <div class="qa-preview">Currently logging every week but not sure if that's too frequent or not enough for meaningful data...</div>
            <div class="qa-footer">
              <span class="qa-stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>7 answers</span>
              <span class="qa-stat"><svg viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3z"/></svg>9 helpful</span>
            </div>
          </div>
        </div>
      </div>

      
      <div class="panel" id="panel-feed">
        <div class="feed-list">
          <div class="feed-card">
            <div class="feed-meta">
              <div class="qa-avatar">JM</div>
              <div>
                <div class="feed-author">Jun M.</div>
                <div class="feed-role">Pro Member</div>
              </div>
              <span class="feed-time">1 hour ago</span>
            </div>
            <div class="feed-body">Just logged my 50th consecutive gym visit this month! The streak tracker in this system keeps me so accountable. Never thought I'd be this consistent. 💪</div>
            <div class="feed-actions">
              <button class="feed-btn"><svg viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3z"/></svg>24 Likes</button>
              <button class="feed-btn"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>3 Comments</button>
            </div>
          </div>
          <div class="feed-card">
            <div class="feed-meta">
              <div class="qa-avatar">SR</div>
              <div>
                <div class="feed-author">Sofia R.</div>
                <div class="feed-role">Basic Member</div>
              </div>
              <span class="feed-time">3 hours ago</span>
            </div>
            <div class="feed-body">Lost 3kg this month according to my body metrics log. The BMI chart really helps visualize the trend. Slow and steady but it's working!</div>
            <div class="feed-actions">
              <button class="feed-btn"><svg viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3z"/></svg>31 Likes</button>
              <button class="feed-btn"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>8 Comments</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="modal-overlay" id="note-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Write a Note</span>
      <button class="modal-close" onclick="closeModal('note-modal')">✕</button>
    </div>
    <div class="field"><label>Date</label><input type="date" id="note-date-input"></div>
    <div class="field"><label>Tag</label>
      <select><option>Workout</option><option>Recovery</option><option>Nutrition</option><option>Cardio</option><option>General</option></select>
    </div>
    <div class="field"><label>Note</label><textarea rows="5" placeholder="Write your note here..."></textarea></div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('note-modal')">Cancel</button>
      <button class="btn-save" onclick="closeModal('note-modal')">Save Note</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="qa-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Ask a Question</span>
      <button class="modal-close" onclick="closeModal('qa-modal')">✕</button>
    </div>
    <div class="field"><label>Your Question</label><input type="text" placeholder="What would you like to ask?"></div>
    <div class="field"><label>Details (optional)</label><textarea rows="4" placeholder="Add more context..."></textarea></div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('qa-modal')">Cancel</button>
      <button class="btn-save" onclick="closeModal('qa-modal')">Post Question</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="post-modal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Write a Post</span>
      <button class="modal-close" onclick="closeModal('post-modal')">✕</button>
    </div>
    <div class="field"><label>What's on your mind?</label><textarea rows="5" placeholder="Share your progress, tips, or motivation..."></textarea></div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal('post-modal')">Cancel</button>
      <button class="btn-save" onclick="closeModal('post-modal')">Post</button>
    </div>
  </div>
</div>

<script>
  document.getElementById('note-date-input').value = new Date().toISOString().split('T')[0];

  const actionButtons = {
    notes: '<button class="btn-action" onclick="openModal(\'note-modal\')">+ Write a Note</button>',
    qa:    '<button class="btn-action" onclick="openModal(\'qa-modal\')">+ Ask a Question</button>',
    feed:  '<button class="btn-action" onclick="openModal(\'post-modal\')">+ Write a Post</button>',
  };

  function switchTab(name, el) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('panel-' + name).classList.add('active');
    document.getElementById('topbar-right').innerHTML = actionButtons[name];
  }
  function openModal(id)  { document.getElementById(id).classList.add('open'); }
  function closeModal(id) { document.getElementById(id).classList.remove('open'); }
  document.querySelectorAll('.modal-overlay').forEach(o => {
    o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
  });
</script>
</body>
</html>

