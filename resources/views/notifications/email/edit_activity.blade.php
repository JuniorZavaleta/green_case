@component('mail::message')
# ¡Tenemos noticias!
## {{ $message }}

@component('mail::panel')
### {{ $activity->title }}

{{ $activity->description }}
@endcomponent

Gracias por tu apoyo.

@component('mail::footer')
{{ config('app.name') }}
@endcomponent

@endcomponent