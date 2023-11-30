![Banner](https://lunime.com/gachaclub/webbanner.jpg)

# Gacha Club PHP API

![Static Badge](https://img.shields.io/badge/language-php-purple) ![GitHub release (with filter)](https://img.shields.io/github/v/release/FemLolStudio/gacha-club-php-api) ![GitHub License](https://img.shields.io/github/license/FemLolStudio/gacha-club-php-api) ![GitHub last commit (by committer)](https://img.shields.io/github/last-commit/FemLolStudio/gacha-club-php-api)



This is a simple Gacha Club API. With it you can make a server for online character import-export and data transfer.

## Setup

1. Rent a web hosting *(For example here: [Contabo](https://contabo.com/en/web-hosting/))*.
2. 
    - Method 1: [Download the files](https://github.com/FemLol2003/gacha-club-php-api/releases) frim this GitHub repo.
    - Method 2: If the web server support Git use it to setup the server.
3. Upload files into the web host.
4. Create the database and run the [`database/database.sql`](database/database.sql) file. *(Recomened to use [phpMyAdmin](https://www.phpmyadmin.net/).)*
5. Apply [enviorment variables](#enviorment-variables) or write them directly into the [`scripts/lib/connect.php`](scripts/lib/connect.php).
    - For example: `getenv("SERVER")` => `"127.0.0.1"`
6. Switching out the links inside the Gacha Club mod. *(For data transfering changing variable names at the importing page. (for example `xdatastring1` => `datastring1`))*
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

## License

Gacha Club PHP API is licensed under the [MIT License](LICENSE.txt). You're free to use, modify, and distribute the code as you see fit.
