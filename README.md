# BLYTD Support Laravel Package

This package provides you some common apis used in blytd services.

> ## Installation
For install this library do these steps:
- Add this line to require section of the composer.json
```
"blytd/support": "^1.0.0"
```
- And also add this section in the composer.json file:
```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mahdi375/support"
        }
    ],
```
- On the end you should have something like this in your composer.json file:
```
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mahdi375/support"
        }
    ],
    "require": {
        ...
        "blytd/support": "^1.0.0"
    },
    ...
```

- Then add this line to the app.php file in the config directory of your project:
```php
    \Blytd\Support\Providers\SupportServiceProvider::class
```

- At the end you need to run composer install cmd:
```bash
composer install
```

> ## Required Configs
This package needs below configs:
* config('central_service.domain')  // central service domain
* config('app.app_id')  // service id


> ## Apis

```php
use Blytd\Support\Facades\Central;

$exchangedValue = Central::exchange('cny', 'usd', 20); // $from, $to, $value

$exchangeRatio = Central::getExhangeRatio('cny', 'usd'); // $from, $to

$exchangedValue = Central::exchangeUsingRatio(20, 0.34); // $value, $ratio
```
