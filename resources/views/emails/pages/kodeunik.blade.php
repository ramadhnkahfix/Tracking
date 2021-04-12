@component('mail::message')
# Kode Unik

Ini adalah kode unik untuk mentracking document anda di Bea Cukai. Kode ini bersifat rahasia jangan beritahu siapapun.

@component('mail::table')
| Laravel       | Table         |   |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      |       |
| Col 3 is      | Right-Aligned |     |
@endcomponent

@component('mail::button', ['url' => $details['url']])
Click Here
@endcomponent

{{ config('app.name') }}
@endcomponent
