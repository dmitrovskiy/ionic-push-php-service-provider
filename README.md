# Ionic push php sdk

This package may be helpful for sending ionic push notifications using Silex framework

## Install

Via Composer

``` bash
$ composer require dmitrovskiy/ionic-push-php-service-provider
```

## Usage

``` php
$app->register(
    new \Dmitrovskiy\IonicPushService\IonicPushServiceProvider(),
    array(
        'ionicPush.appId' => 'APP_ID',
        'ionicPush.appSecretId' => 'APP_SECRET_ID'
    )
);

$notifications = array(
    //...
);

$app['ionicPush.processor']->notify($notifications);
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
