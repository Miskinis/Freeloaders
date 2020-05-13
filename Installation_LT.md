# Įrašymo instrukcija

### Serverio PHP reikalavimai

- PHP versija >= 7.2.5
- Papildymų (extensions) reikalavimas
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

### Duomenų bazės paleidimo instrukcijos

1. Serveryje sukurti tuščia „mysql“ duomenų bazę pavadinimu „freeloaders“.
	- Naudoti prisijungimo duomenis
		- Vardas: „root”
		- Slaptažodis: „root“
		- IP adresas: 127.0.0.1
		- Portas: 3306
2. Į „Jetbrain PhpStorm“ ar kitą terminalą įrašyti komandą „php artisan migrate:fresh --seed“.

### Svetainės paleidimas

- Į „Jetbrain PhpStorm“ ar kitą terminalą įrašyti komandą „php artisan serve“.
