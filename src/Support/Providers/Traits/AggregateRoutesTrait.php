<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Providers\Traits;

use Closure;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Routing\Router;
use Illuminate\Support\Traits\ForwardsCalls;

trait AggregateRoutesTrait
{
    use ForwardsCalls;

    /**
     * @var string|null
     */
    protected ?string $namespace;

    /**
     * @var Closure|null
     */
    protected ?Closure$loadRoutesUsing;

    /**
     * @var Closure|null
     */
    protected static ?Closure $alwaysLoadRoutesUsing;

    /**
     * @var Closure|null
     */
    protected static ?Closure $alwaysLoadCachedRoutesUsing;

    /**
     * @return void
     */
    public function register() : void
    {
        $this->booted(function () {
            $this->setRootControllerNamespace();

            if ($this->routesAreCached()) {
                $this->loadCachedRoutes();
            } else {
                $this->loadRoutes();

                $this->app->booted(function () {
                    $this->app['router']->getRoutes()->refreshNameLookups();
                    $this->app['router']->getRoutes()->refreshActionLookups();
                });
            }
        });
    }

    /**
     * @return void
     */
    public function boot()
    {

    }

    /**
     * @param Closure $routesCallback
     * @return $this
     */
    protected function routes(Closure $routesCallback) : self
    {
        $this->loadRoutesUsing = $routesCallback;

        return $this;
    }

    /**
     * @param Closure|null  $routesCallback
     * @return void
     */
    public static function loadRoutesUsing(?Closure $routesCallback) : void
    {
        self::$alwaysLoadRoutesUsing = $routesCallback;
    }

    /**
     * @param Closure|null  $routesCallback
     * @return void
     */
    public static function loadCachedRoutesUsing(?Closure $routesCallback) : void
    {
        self::$alwaysLoadCachedRoutesUsing = $routesCallback;
    }

    /**
     * @return void
     */
    protected function setRootControllerNamespace() : void
    {
        if (! is_null($this->namespace)) {
            $this->app[UrlGenerator::class]->setRootControllerNamespace($this->namespace);
        }
    }

    /**
     * @return bool
     */
    protected function routesAreCached() : bool
    {
        return $this->app->routesAreCached();
    }

    /**
     * @return void
     */
    protected function loadCachedRoutes() : void
    {
        if (! is_null(self::$alwaysLoadCachedRoutesUsing)) {
            $this->app->call(self::$alwaysLoadCachedRoutesUsing);

            return;
        }

        $this->app->booted(function () {
            require $this->app->getCachedRoutesPath();
        });
    }

    /**
     * @return void
     */
    protected function loadRoutes() : void
    {
        if (! is_null(self::$alwaysLoadRoutesUsing)) {
            $this->app->call(self::$alwaysLoadRoutesUsing);
        }

        if (! is_null($this->loadRoutesUsing)) {
            $this->app->call($this->loadRoutesUsing);
        } elseif (method_exists($this, 'map')) {
            $this->app->call([$this, 'map']);
        }
    }

    /**
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call(string $method, array $parameters) : mixed
    {
        return $this->forwardCallTo(
            $this->app->make(Router::class), $method, $parameters
        );
    }
}
