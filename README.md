# Aplikasi Rumah Sakit - Management Projek
Aplikasi ini dibuat oleh beberapa kelompok menggunakan framework CodeIgniter.

# Kebutuhan sebelum menjalankan Aplikasi
1. Install GIT terlebih dahulu sesuaikan (64bit/32bit): https://git-scm.com/download/win
2. Install XAMPP terbaru minimal : php versi 7.2.0 : https://www.apachefriends.org/download.html
3. Download & Install Composer via https://getcomposer.org/download/


# Bagaimana cara menggunakannya ?
1. Clone projek git ini kedalam folder htdocs ```"C://xampp/htdocs"``` kemudian buka terminal & pastikan anda sedang aktif didalam direktori ```"C://xampp/htdocs"```
	- Ketikan perintah ==> ```git clone https://github.com/aldialhafidzi/manpro-rs.git```
2. Jika projek sudah berhasil diclone maka akan muncul folder baru namanya ***manpro-rs***. Masuk kedalam folder projek "C://xampp/htdocs/manpro-rs" dengan cara :
	- Ketikan perintah ==> ```cd manpro-rs ```
3. Buka terminal & pastikan anda sedang aktif didalam direktori "C://xampp/htdocs/manpro-rs"
	- Ketikan perintah ==> ```composer install```
4. Buka aplikasi XAMPP Control Panel
	- Start Apache Server
	- Start Mysql Server
5. Buat database di mysql dengan nama : ***manpro-rs***
6. Buka kembali terminal & pastikan anda sedang aktif didalam direktori "C://xampp/htdocs/manpro-rs"

	***Drop All Tables*** Jika diperlukan !!!!! ***WARNING*** !!!!!!
	- Ketikan perintah ==> ```php index.php tools drop``` !!!!! ***WARNING*** !!!!!!
	
	***Migrate Database***
	- Ketikan perintah ==> ```php index.php tools migrate```
	
	***Membuat Data Palsu***
	- Ketikan perintah ==> ``` php index.php tools seed RolesSeeder```
	- Ketikan perintah ==> ``` php index.php tools seed UsersSeeder```
	- Ketikan perintah ==> ``` php index.php tools seed SpecializationSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed PoliklinikSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed DokterSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed ObatSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed PasienSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed PenyakitSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed RuanganSeeder ```
	- Ketikan perintah ==> ``` php index.php tools seed TindakanSeeder ```
	
7. Lalu buka dibrowser anda :
	- Home Page 		: http://localhost/manpro-rs/
	- User Login Page	: http://localhost/manpro-rs/user/login
	- Admin Login Page	: http://localhost/manpro-rs/admin/login
	
8. Test login :

	| Field  	| value 				|
	| ------------- | --------------------------------------|
	| **Username** 	| ```Lihat ditable user pilih salah satu``` 	|
	| **Password**  | ```123123A```  				|

