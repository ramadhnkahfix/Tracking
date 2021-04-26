<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokumenSelesaiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dokumen_selesai')->delete();
        
        
        
    }
}