@component('mail::message')
# Pengembalian Dokumen
Yth. {{ ($nama) }} 

Bersama email ini kami mohon maaf untuk tidak menerima dokumen pangajuan anda dikarenakan beberapa alasan sebagai berikut : <br>
{{ ($alasan)}}


#### {{ config('app.name') }}<br>
Jl. Diponegoro No.23 Kota Kediri 64123<br>
Telp. +6281133355511
@endcomponent
