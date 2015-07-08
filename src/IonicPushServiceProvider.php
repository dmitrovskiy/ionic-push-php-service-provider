<?php

namespace Dmitrovskiy\IonicPushService;

use Dmitrovskiy\IonicPush\PushProcessor;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class IonicPushServiceProvider
 *
 * @package Dmitrovskiy\IonicPushService
 */
class IonicPushServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['ionicPush.processor'] = $app->share(
            function () use ($app) {
                $pusher = new PushProcessor(
                    $app['ionicPush.appId'],
                    $app['ionicPush.appSecretId']
                );

                if (isset($app['ionicPush.endPoint'])) {
                    $pusher->setPushEndPoint($app['ionicPush.endPoint']);
                }

                return $pusher;

            }
        );
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }
}
