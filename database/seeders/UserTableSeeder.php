<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id_user' => 1,
                'nama' => 'Super Admin',
                'email' => 'sa@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 1,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            1 => 
            array (
                'id_user' => 2,
                'nama' => 'Sekretaris',
                'email' => 'sekretaris@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => NULL,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            2 => 
            array (
                'id_user' => 3,
                'nama' => 'Umum',
                'email' => 'umum@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 2,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            3 => 
            array (
                'id_user' => 4,
                'nama' => 'Bea Cukai 1',
                'email' => 'beacukai1@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 3,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            4 => 
            array (
                'id_user' => 5,
                'nama' => 'Bea Cukai 2',
                'email' => 'beacukai2@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 4,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            5 => 
            array (
                'id_user' => 6,
                'nama' => 'Perbendaharaan',
                'email' => 'perben@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 5,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            6 => 
            array (
                'id_user' => 7,
                'nama' => 'Kepatuhan Internal',
                'email' => 'ki@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 6,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            7 => 
            array (
                'id_user' => 8,
                'nama' => 'PLI',
                'email' => 'pli@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1Tbe4K/buvGY',
                'status' => 1,
                'role' => 7,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            8 => 
            array (
                'id_user' => 9,
                'nama' => 'Intelijen Penindakan',
                'email' => 'ip@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 8,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            9 => 
            array (
                'id_user' => 10,
                'nama' => 'Penyidik',
                'email' => 'penyidik@gmail.com',
                'email_verified_at' => NULL,
                'password' => 'e1cyQfLxp1Tug',
                'status' => 1,
                'role' => 9,
                'remember_token' => NULL,
                'id_jabatan' => 1,
            ),
            10 => 
            array (
                'id_user' => 11,
                'nama' => 'User 1',
                'email' => 'user@app.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$X3hokyNqxPpXsn.j5UAKx.mbGPiWkonzJGvGe4Ku.n9iNfyVvm4hm',
                'status' => 1,
                'role' => NULL,
                'remember_token' => '31K0YYshOaTfyy0sKJWO3ta1FJm7GD6jJuhFXeE9Jvvj42Nk7Rn8g2wFUCu9',
                'id_jabatan' => 2,
            ),
            11 => 
            array (
                'id_user' => 12,
                'nama' => 'User 2',
                'email' => 'user2@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$KIrH6wMzwL1fftjNHfo..uHFWzxaOBBo2rBUviKS2aiqkt5nIij7i',
                'status' => 1,
                'role' => NULL,
                'remember_token' => 'xYaB8VPrbcTRoZ2P4U3FmLg0wmak8MzSWtrtVxVBPA4VBOCFwwsmWEUfffe3',
                'id_jabatan' => 2,
            ),
            12 => 
            array (
                'id_user' => 13,
                'nama' => 'User 3',
                'email' => 'user3@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2cYYh0PQSTitxC9N47BQsui48bhxVJFnfFSLNVt2E0BhTBuptmh8K',
                'status' => 1,
                'role' => NULL,
                'remember_token' => '2YgskA4BFqn3MQtpZdy0u7NDVi68Mj35jyOOVCGbesS5d3zN4pWOOAavT2np',
                'id_jabatan' => 2,
            ),
            13 => 
            array (
                'id_user' => 14,
                'nama' => 'User 4',
                'email' => 'user4@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Iyrs9xFmMLqi3cT6d8d1DOYjFpMojOA1qjbEI76Eq1e6P5u006pRe',
                'status' => 1,
                'role' => NULL,
                'remember_token' => 'KbkBJCYUz6e4RuLlzGvsHi0j6tCM57DclNluB5ILHD6ehEviIW46ACPCiDKi',
                'id_jabatan' => 2,
            ),
            14 => 
            array (
                'id_user' => 15,
                'nama' => 'User 5',
                'email' => 'user5@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$szqtQRSR7jAtpcCY2iWY4O6uRYHz0kUjsCnfLqCMEhGSTKBR3sVUK',
                'status' => 1,
                'role' => NULL,
                'remember_token' => 'pgPGJkFCuAtSzpCbdnEDwR416vm6RkLj3oaTGrEb53wuXHgfQf40gBriTPTe',
                'id_jabatan' => 2,
            ),
        ));
        
        
    }
}