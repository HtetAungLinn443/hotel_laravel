<?php

namespace App\Providers;

use App\Repository\Bed\BedRepository;
use App\Repository\Room\RoomRepository;
use App\Repository\View\ViewRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Amenity\AmenityRepository;
use App\Repository\Feature\FeatureRepository;
use App\Repository\Bed\BedRepositoryInterface;
use App\Repository\Room\RoomRepositoryInterface;
use App\Repository\View\ViewRepositoryInterface;
use App\Repository\Reservation\ReservationRepository;
use App\Repository\RoomGallery\RoomGalleryRepository;
use App\Repository\Amenity\AmenityRepositoryInterface;
use App\Repository\Feature\FeatureRepositoryInterface;
use App\Repository\Reservation\ReservationRepositoryInterface;
use App\Repository\RoomGallery\RoomGalleryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ViewRepositoryInterface::class, ViewRepository::class);
        $this->app->bind(BedRepositoryInterface::class, BedRepository::class);
        $this->app->bind(AmenityRepositoryInterface::class, AmenityRepository::class);
        $this->app->bind(FeatureRepositoryInterface::class, FeatureRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(RoomGalleryRepositoryInterface::class, RoomGalleryRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class, ReservationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
