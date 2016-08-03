<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Teacher\Teacher;
use App\Domain\Teacher\TeacherRepository;
use App\Infrastructure\Doctrine\Teacher\DoctrineTeacherRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DoctrineTeacherRepository(
                $app['em'],
                $app['em']->getClassMetaData(Teacher::class)
            );
        });
    }
}
