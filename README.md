![Banner](https://lunime.com/gachaclub/webbanner.jpg)

# Gacha Club PHP API

![Static Badge](https://img.shields.io/badge/language-php-purple) [![GitHub release](https://img.shields.io/github/v/release/FemLolStudio/gacha-club-php-api)](https://github.com/FemLolStudio/gacha-club-php-api/releases) [![GitHub License](https://img.shields.io/github/license/FemLolStudio/gacha-club-php-api)](LICENSE.txt) ![GitHub last commit (by committer)](https://img.shields.io/github/last-commit/FemLolStudio/gacha-club-php-api)

This is a simple Gacha Club API. With it you can make a server for online character import-export and data transfer.

[**Download**](https://github.com/FemLolStudio/gacha-club-php-api/releases)

## Setup

1. Rent a web hosting *(For example here: [Contabo](https://contabo.com/en/web-hosting/))*.
2. 
    - Method 1: [Download the files](https://github.com/FemLol2003/gacha-club-php-api/releases) frim this GitHub repo.
    - Method 2: If the web server support Git use it to setup the server.
3. Upload files into the web host.
4. Create the database and run the [`database/database.sql`](database/database.sql) file. *(Recomened to use [phpMyAdmin](https://www.phpmyadmin.net/).)*
5. Apply [Enviorment variables](#enviorment-variables) or write them directly into the [`scripts/lib/connect.php`](scripts/lib/connect.php). *(Follow [Enviorment variables](#enviorment-variables) steps bellow.)*
6. Switching out the links inside the Gacha Club mod. *(Follow [Gacha Club files](#gacha-club-files) steps bellow.)*
7. Using CloudFlare proxy for the web space.**\*** *(Optional)*

> **\*** It's recomened to use CloudFlare proxy, because the Adobe AIR runtime somewhy don't know the Let's Encrypt certificates. *(It's required for https connections)*

## Enviorment variables

You need to setup these variables to enable connection between the PHP files and the database.

* `SERVER`: mysql server address
    - default: `"localhost"`
    - For example: `"127.0.0.1"`, `"localhost"`
* `PORT`: mysql server port *(`1`-`65535`)*
    - Default: `3306`
* `USER`: mysql username
    - For example: `"root"`
* `PASSWORD`: mysql user password
    - For example: `"password@123"`
* `DATABASE`: mysql database name
    - For example: `"gacha-club"`

> If you can't setup enviorment variables write the values directly into the [`scripts/lib/connect.php`](scripts/lib/connect.php) file into the `$static_<name>` variables.

## Gacha Club files

You need to switch out from these files these links:

1. **File: `club_export.php`**
    - Uploading OC to the server *(Export)*
    - ActionScript file: `gacha_club_fla/importexpoort_<number>.as`
    - Old link: `https://gacha.club/gclubdata/club_export.php`
    - New link: `https://<your_domain>/scripts/club_export.php` *(or similar)*
1. **File: `club_import.php`**
    - Downloading OC from the server *(Import)*
    - ActionScript file: `gacha_club_fla/importexpoort_<number>.as`
    - Old link: `https://gacha.club/gclubdata/club_import.php`
    - New link: `https://<your_domain>/scripts/club_import.php` *(or similar)*
1. **File: `club_register.php`**
    - Uploading transfer datas to the server *(Data Transfer)*
    - ActionScript file: `gacha_club_fla/accounts_<number>.as`
    - Old link: `https://lunime.com/gachaclub/gclubdata/club_register.php`
    - New link: `https://<your_domain>/scripts/club_register.php` *(or similar)*
1. **File: `club_login.php`**
    - Downloading transfer datas from the server *(Restore)*
    - ActionScript file: `gacha_club_fla/restore_<number>.as`
    - Old link: `https://lunime.com/gachaclub/gclubdata/club_login.php`
    - New link: `https://<your_domain>/scripts/club_login.php` *(or similar)*

## License

Gacha Club PHP API is licensed under the [MIT License](LICENSE.txt). You're free to use, modify, and distribute the code as you see fit.
