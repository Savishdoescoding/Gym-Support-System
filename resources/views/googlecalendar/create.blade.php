@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Create Google Calendar Event</h2>
  @if(session('status'))<div style="color:green">{{ session('status') }}</div>@endif
  <form method="POST" action="{{ route('google.calendar.store') }}">
    @csrf
    <div><label>Summary</label><input type="text" name="summary" value="{{ old('summary') }}"></div>
    <div><label>Description</label><textarea name="description">{{ old('description') }}</textarea></div>
    <div><label>Date</label><input type="date" name="date" value="{{ old('date') }}"></div>
    <div><label>Start Time</label><input type="time" name="start_time" value="{{ old('start_time') }}"></div>
    <div><label>End Time</label><input type="time" name="end_time" value="{{ old('end_time') }}"></div>
    <div><label>Attendees (comma separated emails)</label><input type="text" name="attendees" value="{{ old('attendees') }}"></div>
    <div><button type="submit">Create Event</button></div>
  </form>
</div>
@endsection
