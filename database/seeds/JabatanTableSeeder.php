<?php

use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        
        
        \DB::table('jabatan')->insert(array (
            0 => 
            array (
                'id_jabatan' => 1,
                'nama' => 'Admin',
            ),
            1 => 
            array (
                'id_jabatan' => 2,
                'nama' => 'User',
            ),
        ));
        
        
    }
}