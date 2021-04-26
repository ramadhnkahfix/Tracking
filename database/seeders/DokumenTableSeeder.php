<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen')->delete();
        
        \DB::table('dokumen')->insert(array (
            0 => 
            array (
                'id_dokumen' => 1,
                'nama_instansi' => 'Gudang Garam',
                'email' => 'gudanggaram@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 2,
                'kategori' => 2,
                'subject' => 'Izin cetak cukai',
                'approve' => 1,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6Im9lS29wZ2NuaWpvRmZPV3JTUG9paWc9PSIsInZhbHVlIjoiK3orSmVoaGR1TlRLRDNBT2dwVkRUZz09IiwibWFjIjoiZWM3YzlhNDIxMTNmNWYxMGQ1YzM1N2M5ODYwYTZlMzVjMGZiYmIxMTVhN2ZmZmU5N2VmMzA0MzI3YWUyOWZhNiJ9',
                'user_role' => 3,
            ),
            1 => 
            array (
                'id_dokumen' => 2,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'user2@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Izin Ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6IkVYaXIwRm9uTHZaRWxHd1RnYmgvTUE9PSIsInZhbHVlIjoiaCt1MDZjMDlVdVRSNW1qYWQyZTVxdz09IiwibWFjIjoiMzUyYTc0ZjIwMGYzNzkwMzE1OWVjY2I0M2IzYzczYjFiOWE1NDBmY2Q4NDM1NDA5ODNjNmQ5ODdkOTc0YTVkNyJ9',
                'user_role' => 2,
            ),
            2 => 
            array (
                'id_dokumen' => 3,
                'nama_instansi' => 'Tajimas',
                'email' => 'user3@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 2,
                'subject' => 'Berkas Cukai Tahunan',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6Ik1ncmxYVU4xYnVOM2ROZ3F1UWlXYWc9PSIsInZhbHVlIjoiaE11VU5kbkxQejdQWDJKbTZ0K3M1dz09IiwibWFjIjoiOTRkOWRlMDAyOTVhY2UzNmQ0OGFkYjhlMWJjOGYwODBmODdjNGM3OGY2NWFjZGFhM2Y0ZmU0NmRkNGI5MDdlNyJ9',
                'user_role' => 3,
            ),
            3 => 
            array (
                'id_dokumen' => 4,
                'nama_instansi' => 'Apache Yahut',
                'email' => 'user4@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Izin Ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6IlQrSmVlWUhvRUpuaXI4elFSU2xGVlE9PSIsInZhbHVlIjoiWWJJOWxkcUhka3ljQ0hXQUVhcG82UT09IiwibWFjIjoiYTJkYjY4MDYyMmU3YWFkMWQ1YzlkNzk0NDYwOTliNTkzNWFhNzZjY2Q5YTliMDc2ZTE4ZGU5ZmU2N2RiNTY4MSJ9',
                'user_role' => 2,
            ),
            4 => 
            array (
                'id_dokumen' => 5,
                'nama_instansi' => 'Gudang Garam',
                'email' => 'gudanggaram@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 2,
                'subject' => 'Administrasi Perizinan Cukai',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6ImhsZGE3UjZBejZTaDZFbEtEUjVSOGc9PSIsInZhbHVlIjoiU1oxRW0ydjg0d1p4SFRrODBZWDhiQT09IiwibWFjIjoiNmQ0OTdkYmIyZWYxZWY2NDU3MjJhMDc1MDlmZWZjMTA1ZDk2Y2I2MjE4NmZlODAxNzlkMTdlMWRhNWIzZmM1NyJ9',
                'user_role' => 4,
            ),
            5 => 
            array (
                'id_dokumen' => 6,
                'nama_instansi' => 'Gudang Garam',
                'email' => 'gudanggaram@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 2,
                'subject' => 'Pembebasan Barang Cukai',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6ImlWY3gyQkc3MTVuZ3BnNnhVVEUxWFE9PSIsInZhbHVlIjoiOVA0WXdmUEtTZ0RVL2plcWhDTFBkQT09IiwibWFjIjoiYTU2MGNlNTJmY2Q4MTFmNjRlNzc4OGVlZDI2NWQxYjY5ZGUzMWVmNWFmM2I5ODRiOTNkMzc4MDIyZWRkMmI2NyJ9',
                'user_role' => 5,
            ),
            6 => 
            array (
                'id_dokumen' => 7,
                'nama_instansi' => 'Gudang Garam',
                'email' => 'gudanggaram@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Administrasi',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6InNVTWpRM29qdENrSXU4eDVoWncvUUE9PSIsInZhbHVlIjoib2dYMEJoci9wRmpBYmpoVVc3QzBaUT09IiwibWFjIjoiNDlkZWI0MjYzNzQ5MGUzN2NhMGJlZGMwMGUyNTIwNDdjZTRhNDc3MDU0ODI3MGExYTVkMGE1YzgzN2FjMGEwMCJ9',
                'user_role' => 6,
            ),
            7 => 
            array (
                'id_dokumen' => 8,
                'nama_instansi' => 'Gudang Garam',
                'email' => 'gudanggaram@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Pengajuan Seminar',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6ImthN2JQV2hoZ0xqdjNCYXFDeUlTZ3c9PSIsInZhbHVlIjoiTVBYU1VMMFFrM01kekFFSExxbEQ3QT09IiwibWFjIjoiZTcwMzYxZWVhM2ExNWUzYjFlZTEyZThiZmI2NTc0NDdhYTBmNjg5YTVjNDA5MzZkOWM2YjU2MDVlZmVmNjFjMSJ9',
                'user_role' => 7,
            ),
            8 => 
            array (
                'id_dokumen' => 9,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tajimas@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 1,
                'subject' => 'Izin ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6InpWSVZVeFJtNXZOdndpd0N3U01oaVE9PSIsInZhbHVlIjoieW85Vld6cGx6V20zc1lzRHhpd3htdz09IiwibWFjIjoiNjY3ZWFlZTNhNzQyYzE2Njg0MjU0M2JhNDRlZjFjYTU5NWJiMGVmZTAwY2QzOGM1YjA5NGIyZTNkOGJmY2NlOSJ9',
                'user_role' => 4,
            ),
            9 => 
            array (
                'id_dokumen' => 10,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tubruk@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 1,
                'subject' => 'Administrasi',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6IkwzbGYxUEY2Z2lmM09URVlVa0FlMFE9PSIsInZhbHVlIjoiUUJOTVRrLzZvOG1SR1hDU01LbmhvQT09IiwibWFjIjoiZGY4OGQ0MDY1MzU3M2E1OGQyZjRiYmJlYTY2MWQ5ZGMxMzExZjlkNDI1Y2QwNzhmNjRlMTMzMmM2NWY2MGIyMiJ9',
                'user_role' => 5,
            ),
            10 => 
            array (
                'id_dokumen' => 11,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tubruk@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 1,
                'subject' => 'Administrasi Barang Ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6IjNtVFc1eWlnOStBKzhxTXJadWd5SXc9PSIsInZhbHVlIjoiQlRiWnhhUHpvNmNtWGFzMWYzMWFmZz09IiwibWFjIjoiZDQyMDA4YWYwNThjYzExNDFjNDJiNTRjOWE0YTNkOTYzNTRlOTZkY2EwYjA1NTlmNDVlNWYzYjQ4ZDgzODhjOCJ9',
                'user_role' => 6,
            ),
            11 => 
            array (
                'id_dokumen' => 12,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tubruk@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Sosialisasi Ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6Im4zNHRibHFGWHFPZFIzZHNHNGVBanc9PSIsInZhbHVlIjoiNzNWTXNzZHYyaXhBeWpSYU5ZMS9ndz09IiwibWFjIjoiMjk1YmQzNzMyZDdlYzViMGRjNjEwNjQ0ODFjNmEzNTlmODVjYzU3OWUwZGY3NzQyNmRlNDEyZTk2ZGEzZjg1MCJ9',
                'user_role' => 7,
            ),
            12 => 
            array (
                'id_dokumen' => 13,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tubruk@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 1,
                'subject' => 'Barang ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6Ill1N090THp4QVBXNkpsWHZmYmtnL0E9PSIsInZhbHVlIjoiYXo5U0V4cGY1a1owVytYNElDRXlPQT09IiwibWFjIjoiNDI1ODMzZjk0NTU0NWM4NWFlYTM0ZmQ0Yjk0MGQxNWE0ODY5YmViYzA1YTA3ZjQ1YjE4YmY0MjBmNWE0YjY1OSJ9',
                'user_role' => 8,
            ),
            13 => 
            array (
                'id_dokumen' => 14,
                'nama_instansi' => 'Tubruk Makmur',
                'email' => 'tubruk@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 1,
                'subject' => 'Barang ekspor',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6IkdmbHhqK0JJZmp2VjI4SlpoU3lDTGc9PSIsInZhbHVlIjoic2pMMEljK3dBcEFKM0h4eHJyaVB2dz09IiwibWFjIjoiMDk5ZjJiNjVmOWJjMWZkZDg4OWFmYzM4NzIwMTc5YzI3ZDMxMzg3ZTlkZDlkOWU1OTczMzEzYzdlYmRhZWIwYSJ9',
                'user_role' => 9,
            ),
            14 => 
            array (
                'id_dokumen' => 15,
                'nama_instansi' => 'Tajimas',
                'email' => 'tajimas@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 2,
                'subject' => 'Izin cetak cukai',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6InFuL3F6Z2lGeUliYlc1K2xTVE55cGc9PSIsInZhbHVlIjoiWEJBYXIxREM2TUtyREFBZjhCd2RjZz09IiwibWFjIjoiMjA4NGQ1NDA3ODlkMmY2ZGJkOWIyMDg2YjAxMzk0YzIwODljNGY1ZjRiYmFiNWE1NTg0MGZhMTk2NjljYmRmZCJ9',
                'user_role' => 4,
            ),
            15 => 
            array (
                'id_dokumen' => 16,
                'nama_instansi' => 'Tajimas',
                'email' => 'tajimas@gmail.com',
                'tanggal' => '2021-04-26',
                'status' => 1,
                'kategori' => 3,
                'subject' => 'Administrasi',
                'approve' => 0,
                'alasan' => NULL,
                'kode' => 'eyJpdiI6Im9zc2hjcnVOMHYwVFJIK1pjNy9OL3c9PSIsInZhbHVlIjoiMVFaNzVWWU56RTU4ampMM3doUUh5QT09IiwibWFjIjoiNGFiMDYwYzU5Y2VlZTFmZjU3MmQ2ZjllYjg2NGFhMTQ0MWVkYzY1Zjk0YTIzMzliOGYwYjNmYzZhZWRhOGQ1OCJ9',
                'user_role' => 5,
            ),
        ));
        
        
    }
}