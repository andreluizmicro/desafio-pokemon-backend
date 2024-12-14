<?php

namespace App\Providers;

use Core\Domain\Integration\External\PokemonApiGatewayInterface;
use Core\Domain\Repository\PokemonRepositoryInterface;
use Core\Domain\Repository\TypeRepositoryInterface;
use Core\Domain\Repository\TransactionInterface;
use Core\Infrastructure\Integration\External\PokemonApiGateway;
use Core\Infrastructure\Repository\Mysql\PokemonRepository;
use Core\Infrastructure\Repository\Mysql\TypeRepository;
use Core\Infrastructure\Repository\Transaction\DBTransaction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PokemonApiGatewayInterface::class, PokemonApiGateway::class);
        $this->app->bind(PokemonRepositoryInterface::class, PokemonRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(TransactionInterface::class, DBTransaction::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
