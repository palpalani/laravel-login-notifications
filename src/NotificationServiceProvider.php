<?php

declare(strict_types=1);

namespace palPalani\LoginNotifications;

use Illuminate\Support\ServiceProvider;
use palPalani\LoginNotifications\Notifications\FailedLogin;
use palPalani\LoginNotifications\Notifications\SuccessfulLogin;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $failedEvent = \Illuminate\Auth\Events\Failed::class;

    /**
     * @var string
     */
    protected $successEvent = \Illuminate\Auth\Events\Login::class;

    /**
     * Boot the notification provider.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->isProduction()) {
            $this->app['events']->listen($this->failedEvent, function ($event) {
                if (isset($event->user) && is_a($event->user, \Illuminate\Database\Eloquent\Model::class)) {
                    $event->user->notify(new FailedLogin(
                        $this->app['request']->ip(),
                        $this->app['request']->userAgent()
                    ));
                }
            });

            $this->app['events']->listen($this->successEvent, function ($event) {
                if (isset($event->user) && is_a($event->user, \Illuminate\Database\Eloquent\Model::class)) {
                    $event->user->notify(new SuccessfulLogin(
                        $this->app['request']->ip(),
                        $this->app['request']->userAgent()
                    ));
                }
            });
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/login-notifications.php' => config_path('login-notifications.php'),
            ], 'config');

            /*
            $migrationFileName = 'create_laravel_login_notification_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }
            */
        }
    }

    /**
     * Register for the notification provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/login-notifications.php', 'login-notifications');
    }
}
