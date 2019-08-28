
## Aplikasi POS (Point of Sales)

Aplikasi ini dapat digunakan untuk usaha retail, toko bangunan, serta usaha lain yang membutuhkan sistem penjualan, pembelian, dan inventori. 

Menggunakan framework laravel

<b> Cara install di webserver lokal (Xampp)</b>

1. Pastikan composer sudah terinstall di komputer anda
buka git/command prompt, masukkan perintah clone :
>> git clone https://github.com/haxorsprogramming/Point-Of-Sales.git

2. Update composer
>> composer install

3. Setting database, sesuaikan nama database dengan database server anda (file database ada di /config/database.php)

4. Lakukan migrate database
>> php artisan migrate

5. Lakukan seeder database
>> php artisan db:seed --class=mainSeeder

6. Jalankan server
>> php artisan serve

Apabila mengalami masalah dalam instalasi, dapat menghubungi saya di alditha.forum@gmail.com
