@component('mail::message')
# Hey {{ $userName }}! 💪

You haven't logged a progress photo in **3 or more days**.

Stay consistent — even small progress is progress!

@component('mail::button', ['url' => url('/progress')])
Log Your Progress
@endcomponent

Keep pushing,
**Gym Rat Team**
@endcomponent
