# DA-Trie Service

Based on Autumn Framework.

This project aims to initiate a keyword lookingup-and-filtering server as a microservice.



## Installation

1.Create file `/etc/datrie-server.conf` and input some keywords:

```php
<?php
return ['foo', 'bar'];
```



2.Initiate dependencies:

```shell
composer install --no-dev
```



3.Launch the service:

```shell
php index.php
```



4.Enjoy:

```shell
curl -i http://localhost:3028/search-in?message=no+this+foo+bar+kinda+thing
```

Response:

```json
[
    {
        "start": 8,
        "end": 10
    },
    {
        "start": 12,
        "end": 14
    }
]
```

## Extra Dependencies
- [PECL/Swoole](https://pecl.php.net/package/swoole)
- [Trie Filter](https://github.com/wulijun/php-ext-trie-filter)



## See

- [Autumn Framework](https://packagist.org/packages/autumn/autumn-framework)

