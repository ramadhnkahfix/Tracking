@component('mail::message')

## Kode Unik Tracking
### Yth. {{ ($nama) }}    

Kode unik ini untuk mentracking document anda di Bea Cukai.<br>
Kode ini bersifat rahasia dan jangan beritahu siapapun.<br>
**_Hati-hati penipuan_**

@component('mail::table')
|Nomor Kode Unik|
|:-------------:|
| {{ ($kode) }}   |
@endcomponent

@component('mail::button', ['url' =>'http://127.0.0.1:8000/'])
Start Tacking
@endcomponent  


#### Bea Cukai Kediri
Jl. Diponegoro No.23 Kota Kediri 64123<br>
Telp. +6281133355511
@endcomponent
