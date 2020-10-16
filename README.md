# iot

## Setup

 - Buat database mysql baru lalu import test.sql
 - Konfigurasi file conn.php di folder api
 - [Testing POST]
 
		- Jalankan terminal pada folder api, lalu eksekusi file run.bat (windows only) 
		- Atau eksekusi perintah CURL berikut ini nonstop dalam infinite loop 
		
		```		
		curl -d "iddevice=cedbba1a-0eb9-11eb-9779-98eecb5efc46" "http://localhost/iot/api/"
		```
		
 - Buka index.html di browser