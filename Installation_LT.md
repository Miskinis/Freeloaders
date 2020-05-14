# Įrašymo instrukcija

### Projekto Reikalavimai kompiuteriui

- Įrašyti "Npm"
- Įrašyti "composer"
- Įrašyti "Jetbrain PhpStorm" ar kitą IDE

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
	- Numatytosios prisijungimo konfiguracijos
		- Vardas: „root”
		- Slaptažodis: „root“
		- IP adresas: 127.0.0.1
		- Portas: 3306
	- Jei reikia pakeisti prisijungimo konfiguracijas, sukurkite naują failą .env naudojant .env.emaple kaip pavizdį ir konfiguruokite savo nuožiūra.
2. Į „Jetbrain PhpStorm“ ar kitą terminalą įrašyti komandą „php artisan migrate:fresh --seed“.

### Svetainės paleidimas

- Sukonfiguruoti prisijungimą
    - Nustatyti projekto root direktorija "freeloaders\public"
    - Nustatyti maršrutizavimo instrukcijų failą "freeloaders\server.php"
    - Nustatyti portą "8000"
    - Nustatyti darbinę direktorija "freeloaders\public"
- Į „Jetbrain PhpStorm“ ar kitą terminalą įrašyti komandą „php artisan serve“.
