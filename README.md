# Aplikasi Rumah Sakit - Management Projek
Aplikasi ini dibuat oleh beberapa kelompok menggunakan framework CodeIgniter.

# Kebutuhan sebelum menjalankan Aplikasi
1. Install XAMPP terbaru minimal : php versi 7.2.0
2. Download & Install Composer via https://getcomposer.org/download/

# Bagaimana cara menggunakannya ?
1. Clone projek git ini kedalam folder htdocs "C://xampp/htdocs"
2. Masuk kedalam folder projek "C://xampp/htdocs/manpro-rs"
3. Buka terminal & pastikan anda sedang aktif didalam direktori "C://xampp/htdocs/manpro-rs"
	- Ketikan perintah tanpa tanda kutip => ```composer install```
4. Buka aplikasi XAMPP Control Panel
	- Start Apache Server
	- Start Mysql Server
5. Buat database di mysql dengan nama *manpro-rs*
6. Buka kembali terminal & pastikan anda sedang aktif didalam direktori "C://xampp/htdocs/manpro-rs"

	***Migrate Database***
	- Ketikan perintah tanpa tanda kutip => ```php index.php tools migrate```
	
	***Membuat Data Palsu***
	- Ketikan perintah tanpa tanda kutip => ```php index.php tools seed RolesSeeder```
	- Ketikan perintah tanpa tanda kutip => ```php index.php tools seed UsersSeeder```
	
7. Lalu buka dibrowser anda : http://localhost/manpro-rs
