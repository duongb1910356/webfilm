<VirtualHost *:80>	
    DocumentRoot "C:/xampp/htdocs" 
    ServerName localhost
    # Set access permission 
    <Directory "C:/xampp/htdocs"> 
        AllowOverride None
        Require all granted
    </Directory>
</VirtualHost>

<VirtualHost *:80>	
   DocumentRoot "path_to_/b1910356_webfilm/webphim/public" 
   ServerName webphim.localhost
   # Set access permission 
   <Directory "path_to_/b1910356_webfilm/webphim/public"> 
		AllowOverride None
		Require all granted
	 
		RewriteEngine On
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . index.php [L]
   </Directory>
</VirtualHost>

- Copy 2 đoạn code trên (LƯU Ý ĐƯỜNG DẪN LƯU THƯ MỤC CHỈNH SỬA CHO PHÙ HỢP) thêm vào file C:\xampp\apache\conf\extra\httpd-vhosts
- Tạo csdl mới có tên web_film rồi import file web_film.sql
- Nếu import bị lỗi thì đừng lo nhé, tại vượt giới hạn max size thôi
- Tìm file C:\xampp\php\php.ini sửa dòng upload_max_filesize=40MB là được. Cầu nguyện là vậy, không thì hỏi  stackoverflow
