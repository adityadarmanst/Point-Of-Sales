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
        	'kode' => '451233',
        	'nama_lengkap' => 'Budi Permana',
        	'alamat' => 'Medan',
            'no_hp' => '083189223122',
            'email' => 'budi.permana@gmail.com',
            'active' => 'y',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tbl_kategori') -> insert([
            'kode' => '2211',
            'nama' => 'Snack',
            'active' => 'y'
        ]);
        DB::table('tbl_kategori') -> insert([
            'kode' => '3221',
            'nama' => 'Air Mineral',
            'active' => 'y'
        ]);
        DB::table('tbl_kategori') -> insert([
            'kode' => '6533',
            'nama' => 'Mie Instan',
            'active' => 'y'
        ]);
        DB::table('tbl_kategori') -> insert([
            'kode' => '5412',
            'nama' => 'Rokok',
            'active' => 'y'
        ]);

        DB::table('tbl_user') -> insert([
            'username' => 'admin',
            'nama' => 'Administrator',
            'password' =>  password_hash("admin", PASSWORD_DEFAULT),
            'tipe' => 'admin',
            'last_login' => date("Y-m-d H:i:s")
        ]);

        DB::table('tbl_produk') -> insert([
            'kode' => '09011',
            'nama' => 'Mogi Mogi Ayam Bakar',
            'kategori' => '2211',
            'satuan' => 'bungkus',
            'deksripsi' => 'produk contoh',
            'harga_jual' => 2500,
            'stok' => 0,
            'created_at' => date("Y-m-d H:i:s")
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
