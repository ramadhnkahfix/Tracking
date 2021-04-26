<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailDokumenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_dokumen')->delete();
        
        \DB::table('detail_dokumen')->insert(array (
            0 => 
            array (
                'id_detail_dokumen' => 1,
                'file' => 'Book1.xlsx',
                'dokumen_id_dokumen' => 1,
            ),
            1 => 
            array (
                'id_detail_dokumen' => 2,
                'file' => 'Doc1.docx',
                'dokumen_id_dokumen' => 1,
            ),
            2 => 
            array (
                'id_detail_dokumen' => 3,
                'file' => 'Book2.xlsx',
                'dokumen_id_dokumen' => 2,
            ),
            3 => 
            array (
                'id_detail_dokumen' => 4,
                'file' => 'Doc2.docx',
                'dokumen_id_dokumen' => 2,
            ),
            4 => 
            array (
                'id_detail_dokumen' => 5,
                'file' => 'Book3.xlsx',
                'dokumen_id_dokumen' => 3,
            ),
            5 => 
            array (
                'id_detail_dokumen' => 6,
                'file' => 'pict1.jpg',
                'dokumen_id_dokumen' => 3,
            ),
            6 => 
            array (
                'id_detail_dokumen' => 7,
                'file' => 'Book5.xlsx',
                'dokumen_id_dokumen' => 4,
            ),
            7 => 
            array (
                'id_detail_dokumen' => 8,
                'file' => 'pict1.jpg',
                'dokumen_id_dokumen' => 5,
            ),
            8 => 
            array (
                'id_detail_dokumen' => 9,
                'file' => 'pdf1.pdf',
                'dokumen_id_dokumen' => 5,
            ),
            9 => 
            array (
                'id_detail_dokumen' => 10,
                'file' => 'Doc1.docx',
                'dokumen_id_dokumen' => 6,
            ),
            10 => 
            array (
                'id_detail_dokumen' => 11,
                'file' => 'pict2.jpg',
                'dokumen_id_dokumen' => 6,
            ),
            11 => 
            array (
                'id_detail_dokumen' => 12,
                'file' => 'Book3.xlsx',
                'dokumen_id_dokumen' => 7,
            ),
            12 => 
            array (
                'id_detail_dokumen' => 13,
                'file' => 'pdf2.pdf',
                'dokumen_id_dokumen' => 7,
            ),
            13 => 
            array (
                'id_detail_dokumen' => 14,
                'file' => 'Doc3.docx',
                'dokumen_id_dokumen' => 8,
            ),
            14 => 
            array (
                'id_detail_dokumen' => 15,
                'file' => 'Book3.xlsx',
                'dokumen_id_dokumen' => 9,
            ),
            15 => 
            array (
                'id_detail_dokumen' => 16,
                'file' => 'pdf3.pdf',
                'dokumen_id_dokumen' => 9,
            ),
            16 => 
            array (
                'id_detail_dokumen' => 17,
                'file' => 'pict3.jpg',
                'dokumen_id_dokumen' => 9,
            ),
            17 => 
            array (
                'id_detail_dokumen' => 18,
                'file' => 'Doc3.docx',
                'dokumen_id_dokumen' => 10,
            ),
            18 => 
            array (
                'id_detail_dokumen' => 19,
                'file' => 'pdf3.pdf',
                'dokumen_id_dokumen' => 10,
            ),
            19 => 
            array (
                'id_detail_dokumen' => 20,
                'file' => 'pict3.jpg',
                'dokumen_id_dokumen' => 11,
            ),
            20 => 
            array (
                'id_detail_dokumen' => 21,
                'file' => 'Doc3.docx',
                'dokumen_id_dokumen' => 11,
            ),
            21 => 
            array (
                'id_detail_dokumen' => 22,
                'file' => 'pdf3.pdf',
                'dokumen_id_dokumen' => 12,
            ),
            22 => 
            array (
                'id_detail_dokumen' => 23,
                'file' => 'Book3.xlsx',
                'dokumen_id_dokumen' => 13,
            ),
            23 => 
            array (
                'id_detail_dokumen' => 24,
                'file' => 'pict3.jpg',
                'dokumen_id_dokumen' => 13,
            ),
            24 => 
            array (
                'id_detail_dokumen' => 25,
                'file' => 'Doc3.docx',
                'dokumen_id_dokumen' => 14,
            ),
            25 => 
            array (
                'id_detail_dokumen' => 26,
                'file' => 'Book3.xlsx',
                'dokumen_id_dokumen' => 14,
            ),
            26 => 
            array (
                'id_detail_dokumen' => 27,
                'file' => 'pdf4.pdf',
                'dokumen_id_dokumen' => 15,
            ),
            27 => 
            array (
                'id_detail_dokumen' => 28,
                'file' => 'Book4.xlsx',
                'dokumen_id_dokumen' => 15,
            ),
            28 => 
            array (
                'id_detail_dokumen' => 29,
                'file' => 'pdf4.pdf',
                'dokumen_id_dokumen' => 16,
            ),
            29 => 
            array (
                'id_detail_dokumen' => 30,
                'file' => 'Book4.xlsx',
                'dokumen_id_dokumen' => 16,
            ),
        ));
        
        
    }
}