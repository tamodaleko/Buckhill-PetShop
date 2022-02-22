<p align="center">
  <img src="https://www.buckhill.co.uk/assets/images/xlogo-blue.png.pagespeed.ic.PYdYfUPDLG.webp" width="250">
</p>

<h2 align="center">Buckhill | PetShop</h2>
<p align="center">https://buckhill.co.uk</p>
<p align="center">Laravel v8.83.0</p>

## Requirements

The app requires the following extensions in order to work properly:

-   `PHP >= 8.0`
-   `BCMath`
-   `Ctype`
-   `Fileinfo`
-   `JSON`
-   `Mbstring`
-   `OpenSSL`
-   `PDO`
-   `Tokenizer`
-   `XML`


## Installation

Follow the steps below to install the app quickly on your local machine.

Download Composer [here](https://getcomposer.org/download).

Install dependencies:

```bash
composer install
```

Generate app key:

```bash
php artisan key:generate
```

Run database migrations and seeds:

```bash
php artisan migrate --seed
```

Generate secret key for JWT encryption:

```bash
php artisan jwt:secret
```

Open the app in browser:

```bash
php artisan serve
```
