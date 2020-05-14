# Installation instructions

### Projekto Reikalavimai kompiuteriui

- Install "Npm"
- Install "composer"
- Install "Jetbrain PhpStorm" or other IDE

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
    - Default connection configurations
		- username: "root"
		- password: "root"
		- IP address: 127.0.0.1
		- Port: 3306
	- If needed add an .env file based of .env.example to override default configurations.
2. Use "Jetbrain PhpStorm" or other terminal to execute the following command „php artisan migrate:fresh --seed“ to create and populate data tables.

### Running the website

- Set connection
    - Set Project root directory "freeloaders\public"
    - Set to use a router script "freeloaders\server.php"
    - Set Port "8000"
    - Set custom working directory "freeloaders\public"
- Use "Jetbrain PhpStorm" or other terminal to execute the following command „php artisan serve“ to run the server.
