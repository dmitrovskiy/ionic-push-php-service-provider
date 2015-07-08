<?php

namespace Dmitrovskiy\IonicPushService\Tests\Unit;

use Dmitrovskiy\IonicPushService\IonicPushServiceProvider;
use Dmitrovskiy\IonicPushService\Tests\TestCase;
use Silex\Application;

class IonicPushServiceProviderTest extends TestCase
{
    /** @var  Application */
    protected $app;

    public function setUp()
    {
        $this->app = new Application();
    }

    public function tearDown()
    {
        unset($this->app);
    }

    public function testInjectionWithoutApiEndPoint()
    {
        $injectionData = array(
            'ionicPush.appId'    => 'test ID',
            'ionicPush.appSecretId' => 'test api ID'
        );

        $this->app->register(new IonicPushServiceProvider(), $injectionData);
        $this->assertNotEmpty($this->app['ionicPush.processor']);
    }

    public function testInjectionWithApiEndPoint()
    {
        $injectionData = array(
            'ionicPush.appId'    => 'test ID',
            'ionicPush.appSecretId' => 'test api ID',
            'ionicPush.endPoint' => 'test end point'
        );

        $this->app->register(new IonicPushServiceProvider(), $injectionData);
        $this->assertNotEmpty($this->app['ionicPush.processor']);
        $this->assertEquals(
            $this->app['ionicPush.processor']->getPushEndPoint(),
            $injectionData['ionicPush.endPoint']
        );
    }

    public function testBoot()
    {
        $pushProvider = new IonicPushServiceProvider();
        $pushProvider->boot($this->app);
    }
}
