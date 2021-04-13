@component('mail::message')
# Kode Unik

Ini adalah kode unik untuk mentracking document anda di Bea Cukai. Kode ini bersifat rahasia jangan beritahu siapapun.

@component('mail::table')
|Nomor Kode Unik|
|:-------------:|
| {{ $kode }}   |
@endcomponent

@component('mail::button', ['url' =>''])
Start Tacking
@endcomponent  

Thanks,
{{ config('app.name') }}
@endcomponent
