# hatebook

- Install apache2 (sudo apt-get install apache2)
- Update apt repositories (sudo apt-get update)
- Install nodejs (sudo apt-get install nodejs)
- Install npm (sudo apt-get install npm)

- To configure apache2's root from /var/www/:
	- edit /etc/apache2/sites-available/000-default.conf, changing the "DocumentRoot /var/www" line to point at a custom folder
	- In the same file, create an Alias to the /resources/album_content directory:

		Alias /album_content/ "/your/absolute/path/to/resources/album_content/"
		<Directory "/your/absolute/path/to/resources/album_content/">
	  	  Options FollowSymLinks
	  	  AllowOverride None
	  	  Require all granted
		</Directory>

	- edit /etc/apache2/apache2.conf, changing "<Directory /var/www/ >" to the preferred directory
	- sudo service restart apache2

### Mac OSX
- sudo vi /etc/apache2/httpd.conf
- edit httpd.conf "DocumentRoot /Library/WebServer/Documents" line to point at a custom folder
- In the same section change `AllowOverride None` to `AllowOverride All`
- Uncomment `LoadModule rewrite_module libexec/apache2/mod_rewrite.so`
