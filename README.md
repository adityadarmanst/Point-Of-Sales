
## Aplikasi POS (Point of Sales)

Menggunakan framework laravel

<b> Cara install di webserver lokal (Xampp)</b>

1. Pastikan composer sudah terinstall di komputer anda
buka git/command prompt, masukkan perintah clone :
>> git clone https://github.com/haxorsprogramming/Laravel-Pos.git

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
