<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Produto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('PRODUTOS');
            $event->menu->add([
                'text'        => 'Produtos',
                'url'         => 'produtos',
                'icon'        => 'fas fa-fw fa-users',
                'label'       => Produto::count(),
                'label_color' => 'success',
            ]);
        });
    }
}
