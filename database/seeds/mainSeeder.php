<?php

use Illuminate\Database\Seeder;

class mainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tbl_supplier') -> insert([
        	'kode' => '0922123332',
        	'nama_lengkap' => 'Aditia Darma',
        	'alamat' => 'Medan',
            'no_hp' => '083189223122',
            'email' => 'alditha.forum@gmail.com',
            'active' => 'y',
            'created_at' => date("Y-m-d H:i:s") 
        ]);
        
        DB::table('tbl_kategori') -> insert([
            'kode' => '0001',
            'nama' => 'Snack',
            'active' => 'y'
        ]);

        DB::table('tbl_user') -> insert([
            'username' => 'admin',
            'nama' => 'Administrator',
            'password' =>  password_hash("admin", PASSWORD_DEFAULT),
            'tipe' => 'admin',
            'last_login' => date("Y-m-d H:i:s") 
        ]);

        DB::table('tbl_user') -> insert([
            'username' => 'kasir',
            'nama' => 'Kasir',
            'password' =>  password_hash("kasir", PASSWORD_DEFAULT),
            'tipe' => 'kasir',
            'last_login' => date("Y-m-d H:i:s") 
        ]);

    }
}
