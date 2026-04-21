<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Discover — Gym System</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/discover.css">

    @livewireStyles

</head>
<body>

<div class="page-wrap">

    <aside class="sidebar">
        <div class="sb-logo">
        <a href="{{ route('dashboard') }}">GYM RAT</a>
        <span>Fitness Tracking System</span>

</div>

    <nav class="sb-nav">
        <a class="sb-item active" href="{{ route('discover') }}">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35M11 8l2 3-2 3-2-3 2-3z"/></svg>
            Discover
        </a>

        <a class="sb-item" href="{{ route('progress') }}">
            <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            Progress
        </a>

        <a class="sb-item" href="{{ route('exercises') }}">
            <svg viewBox="0 0 24 24"><path d="M6.5 6.5h11M6.5 17.5h11M3 10h3.5M3 14h3.5M17.5 10H21M17.5 14H21"/></svg>
            Exercises
        </a>

    <div class="sb-section">Account</div>

        <a class="sb-item" href="{{ route('settings') }}">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
            Settings
        </a>

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="sb-item" style="width: 100%; text-align: left; border: none; background: none; cursor: pointer; padding: inherit; font: inherit; color: inherit;">
            <svg viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
            </button>
        </form>

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
            <button class="btn-action" onclick="Livewire.dispatch('open-modal')">+ Write a Note</button>
            </div>
</div>
        <div class="content">
            @livewire('note-manager')
        </div>
    </div>
</div>

@livewireScripts

</body>
</html>
