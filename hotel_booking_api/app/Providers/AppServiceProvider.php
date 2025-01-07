<?php

namespace App\Providers;
use services;

use App\Services\RoomService;
use App\Services\HotelService;

use App\Services\RoomTypeService;
use App\Repositories\RoomRepository;
use App\Repositories\HotelRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RoomTypeRepository;
use App\Services\Interfaces\IRoomService;
use App\Services\Interfaces\IHotelService;
use App\Services\Interfaces\IRoomTypeService;
use App\Repositories\Interfaces\IRoomRepository;
use App\Repositories\Interfaces\IHotelRepository;
use App\Repositories\Interfaces\IRoomTypeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IHotelRepository::class, HotelRepository::class);
        $this->app->bind(IHotelService::class, HotelService::class);

        $this->app->bind(IRoomService::class, RoomService::class);
        $this->app->bind(IRoomRepository::class, RoomRepository::class);

        $this->app->bind(IRoomTypeService::class, RoomTypeService::class);
        $this->app->bind(IRoomTypeRepository::class, RoomTypeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
