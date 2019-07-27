<?php

use Illuminate\Database\Seeder;

class SupplierSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
        	'kode' => '0922123332',
        	'nama_lengkap' => 'Aditia Darma',
        	'alamat' => 'Medan',
            'no_hp' => '083189223122',
            'email' => 'alditha.forum@gmail.com',
            'active' => 'y',
            'created_at' => date("Y-m-d H:i:s") 
        ]);
    }
}
