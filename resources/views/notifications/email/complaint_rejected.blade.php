@component('mail::message')
# Lo sentimos
## Caso de contaminación rechazado

@component('mail::panel')
Caso de contaminación **rechazado** sobre **{{ $contamination_type }}** ubicado en el distrito de **{{ $district }}**.
Por el siguiente motivo

> {{ $reason }}
@endcomponent

Gracias por tu apoyo.

@component('mail::footer')
{{ config('app.name') }}
@endcomponent

@endcomponent