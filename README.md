# OctoberCMS Sentry Plugin
This is a sample for how to integrate [Sentry's](https://sentry.io) [laravel plugin](https://github.com/getsentry/sentry-laravel) with OctoberCMS. 

To install, simply:

1. [Create a new plugin](https://octobercms.com/docs/console/scaffolding#scaffold-create-plugin) with the `php artisan create:plugin` command.
2. Replace the newly created plugin with these files.
3. Change the [`namespace`](Plugin.php#L1) in the `Plugin.php` file to reflect your new plugin author/name.
4. Run `composer update --prefer-stable` in the main repo to install the [sentry-laravel](https://github.com/getsentry/sentry-laravel) package (this will update everything... just a heads up :smiley:)

## Configuration
You will need to add either a **configuration file**, or a **`.env` file** to use this plugin.

### Using an configuration file
Create a file in your main October directory, `config/sentry.php`, with the following contents:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sentry Configuration
    |--------------------------------------------------------------------------
    |
    | Use the Your Sentry DSN!
    |
    */

    'dsn' => 'https://****:*****@sentry.io/***',
    'breadcrumbs.sql_bindings' => true, # Could be insecure!
    'release' => trim(exec('git log --pretty="%h" -n1 HEAD')),
];
```

### Using an environment variable
Just add your Sentry DSN to your `.env` file, like so:
```sh
SENTRY_DSN=https://****:*****@sentry.io/*****
```

## License
[MIT](LICENSE)
