[![Sentry](https://a0wx592cvgzripj.global.ssl.fastly.net/_static/2073574936914380bbe78364e39e7585/getsentry/images/branding/png/sentry-horizontal-black.png)](https://sentry.io)
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
Create a file, `config/sentry.php`, with the following contents:

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
    'breadcrumbs.sql_bindings' => true,
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
