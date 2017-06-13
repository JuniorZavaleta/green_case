@component('mail::message')
# Felicitaciones
## Caso de contaminacion aprobado

@component('mail::panel')
Caso de contaminación **aprobado** sobre **{{ $contamination_type }}** ubicado en el distrito de **{{ $district }}**.
@endcomponent

Gracias por tu apoyo.

@component('mail::footer')
{{ config('app.name') }}
@endcomponent

@endcomponent