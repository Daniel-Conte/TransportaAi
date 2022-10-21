<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Produto;
use \App\Cidade;
use \App\Veiculo;
use \App\Envolvido;
use \App\Transporte;

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
            //$event->menu->add('PRODUTOS');
            $event->menu->add([
                'text'        => 'Produtos',
                'url'         => 'produtos',
                'icon'        => 'fas fa-fw fa-shopping-cart',
                'label'       => Produto::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Cidades',
                'url'         => 'cidades',
                'icon'        => 'fas fa-fw fa-flag',
                'label'       => Cidade::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Veículos',
                'url'         => 'veiculos',
                'icon'        => 'fas fa-fw fa-truck',
                'label'       => Veiculo::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Envolvidos',
                'url'         => 'envolvidos',
                'icon'        => 'fas fa-fw fa-user',
                'label'       => Envolvido::count(),
                'label_color' => 'success',
            ]);

            $event->menu->add([
                'text'        => 'Transportes',
                'url'         => 'transportes',
                'icon'        => 'fas fa-fw fa-truck',
                'label'       => Transporte::count(),
                'label_color' => 'success',
            ]);
        });
    }
}
