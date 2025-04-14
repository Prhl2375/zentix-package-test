# Zentix Package Test
___

## Installation

### 1. Add the Package to Your Project via Composer

Add the repository to your application's `composer.json` file so that Composer can find the package directly from GitHub:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Prhl2375/zentix-package-test"
        }
    ],
    "require": {
        "prhl2375/zentix-package-test": "dev-master"
    }
}
```

Then, run:

```bash
composer update
```


---

## Publishing Package Resources

### Publish Public Assets

To publish the package’s public assets (CSS, JS, images) to your host application's public directory, run:

```bash
php artisan vendor:publish --tag=zentixpackage-assets
```

This copies the assets to:

```
public/prhl2375/zentix-package-test
```

### Publish Configuration

To publish the configuration file so that you can customize package options, run:

```bash
php artisan vendor:publish --tag=zentixpackage-config
```

*Note:* The configuration file will be copied to your application’s config directory.

---

## Migrations and Seeders

The package automatically loads its migrations with the following code in the service provider:

```php
$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
```

Thus, running:

```bash
php artisan migrate
```

will execute the package migrations without any extra steps.

### Seeding Test Data

The package provides a custom Artisan command to seed the database with test data. Once the migrations have run, you can run:

```bash
php artisan zentipackage:seed
```

This command will populate your database with dummy contacts and their phone numbers.


---


## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---
