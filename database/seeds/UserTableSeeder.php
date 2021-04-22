<?php

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
        ));
        
        
    }
}