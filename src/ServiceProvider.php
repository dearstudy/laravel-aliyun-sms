<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/2/17
 * Time: 下午4:12
 */

namespace Cmzz\LaravelAliyunSms;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;


class ServiceProvider extends LaravelServiceProvider
{
    protected $defer = true;

    public function boot()
    {

        $this->publishes([
            realpath(__DIR__.'/config.php') => config_path('aliyunsms.php'),
        ]);

    }

    public function register()
    {

        $this->mergeConfigFrom(realpath(__DIR__.'/config.php'), 'aliyunsms');

        $this->app->bind(AliyunSms::class, function() {
            return new AliyunSms();
        });
    }

    protected function configPath()
    {
        return __DIR__ . '/config.php';
    }

}