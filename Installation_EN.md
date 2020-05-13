# Installation instructions

### PHP requirements

- PHP version >= 7.2.5
- Extensions
	- BCMath
	- Ctype
	- Fileinfo
	- JSON
	- Mbstring
	- OpenSSL
	- PDO
	- Tokenizer
	- XML
	- Curl
	- gd2
	- pdo_mysql
	- Imagick

### Database setup

1. Create an empty database and name it "freeloaders".
    - Use the following connection configurations
		- username: "root"
		- password: "root"
		- IP address: 127.0.0.1
		- Port: 3306
2. Use "Jetbrain PhpStorm" or other terminal to execute the following command „php artisan migrate:fresh --seed“ to create and populate data tables.

### Running the website

- Use "Jetbrain PhpStorm" or other terminal to execute the following command „php artisan serve“ to run the server.
