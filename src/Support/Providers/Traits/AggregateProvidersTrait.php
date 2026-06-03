<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Providers\Traits;

use Illuminate\Support\ServiceProvider;

trait AggregateProvidersTrait
{
    /**
     * @var array<int, class-string<ServiceProvider>>
     */
    protected array $providers = [];

    /**
     * @var array<int, ServiceProvider>
     */
    protected array $instances = [];

    /**
     * @return void
     */
    public function register() : void
    {
        $this->instances = [];

        foreach ($this->providers as $provider) {
            $this->instances[] = $this->app->register($provider);
        }
    }

    /**
     * @return array
     */
    public function provides() : array
    {
        $provides = [];

        foreach ($this->providers as $provider) {
            $instance = $this->app->resolveProvider($provider);
            $provides = array_merge($provides, $instance->provides());
        }

        return $provides;
    }
}
