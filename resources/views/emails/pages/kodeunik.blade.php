@component('mail::message')
# Kode Unik
## Yth.kepada User

Ini adalah kode unik untuk mentracking document anda di Bea Cukai. Kode ini bersifat rahasia jangan beritahu siapapun.

@component('mail::table')
|Nomor Kode Unik|
|:-------------:|
|               |
| Right-Aligned |
@endcomponent

@component('mail::button', ['url' =>'', 'color' => 'primary'])
Click Here
@endcomponent  

{{ config('app.name') }}
@endcomponent
