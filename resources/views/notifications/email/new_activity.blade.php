@component('mail::message')
# ¡Tenemos noticias!
## {{ $message }}

@component('mail::panel')
### {{ $activity->title }}

{{ $activity->description }}
@endcomponent

Te dejamos algunas imágenes sobre la actividad realizada

@foreach ($activity->images as $image)
![Image]({{ $image->img }})
@endforeach

Gracias por tu apoyo.

@component('mail::footer')
{{ config('app.name') }}
@endcomponent

@endcomponent