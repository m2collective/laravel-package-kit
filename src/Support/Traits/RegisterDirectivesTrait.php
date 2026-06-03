<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Traits;

use Illuminate\Support\Facades\Blade;
use M2Collective\PackageKit\View\Contracts\Directive;
use M2Collective\PackageKit\View\Contracts\Directives\ConditionalDirective;
use M2Collective\PackageKit\View\Contracts\Directives\SimpleDirective;

trait RegisterDirectivesTrait
{
    /**
     * @param array $directives
     * @param bool $registering
     * @return void
     */
    private function registerDirectives(array $directives, bool $registering = true) : void
    {
        if($directives !== [] && $registering) {
            foreach ($directives as $directive) {
                $this->registerDirective($directive);
            }
        }
    }

    /**
     * @param Directive $directive
     * @return void
     */
    private function registerDirective(Directive $directive) : void
    {
        if($directive instanceof ConditionalDirective) {
            Blade::directive($directive->openingName(), [$directive, 'openingHandler']);
            Blade::directive($directive->logicalName(), [$directive, 'logicalHandler']);
            Blade::directive($directive->closingName(), [$directive, 'closingHandler']);
        }

        if($directive instanceof SimpleDirective) {
            Blade::directive($directive->openingName(), [$directive, 'openingHandler']);
        }
    }
}
