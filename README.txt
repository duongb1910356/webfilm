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
   DocumentRoot "D:/b1910356_webfilm/webphim/public" 
   ServerName webphim.localhost
   # Set access permission 
   <Directory "D:/b1910356_webfilm/webphim/public"> 
		AllowOverride None
		Require all granted
	 
		RewriteEngine On
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule . index.php [L]
   </Directory>
</VirtualHost>

- Copy 2 đoạn code trên (LƯU Ý ĐƯỜNG DẪN LƯU THƯ MỤC CÓ THỂ KHÁC VỚI ÔNG NÊN ÔNG CHỈNH SỬA CHO PHÙ HỢP) thêm vào file C:\xampp\apache\conf\extra\httpd-vhosts
- Tạo csdl mới có tên web_film rồi import file web_film.sql t gửi vào
- Nếu import bị lỗi thì đừng lo nhé, tại vượt giới hạn max size thôi
- Ô tìm file C:\xampp\php\php.ini sửa dòng upload_max_filesize=40MB là được. Cầu nguyện là vậy
Project này t học thầy Bảo được 10 (cũng hơi bất ngờ), tip nhỏ là khi làm project ông nên sử dụng hết các công nghệ mà thầy giới thiệu bootstrap, jquery, php, ORM = lavarel,...thấy nhiều vậy chứ sử dụng nhiều thì ông code đỡ cực