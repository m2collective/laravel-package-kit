<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Providers\Concerns;

use Illuminate\Support\Facades\Blade;
use M2Collective\PackageKit\View\Directives\Contracts\ClosingTag;
use M2Collective\PackageKit\View\Directives\Contracts\LogicalTag;
use M2Collective\PackageKit\View\Directives\Contracts\OpeningTag;
use M2Collective\PackageKit\View\Directives\Directive;

trait RegisterDirectives
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
        if($directive instanceof OpeningTag) {
            Blade::directive($directive->openingName(), [$directive, 'openingHandler']);
        }

        if($directive instanceof LogicalTag) {
            Blade::directive($directive->logicalName(), [$directive, 'logicalHandler']);
        }

        if($directive instanceof ClosingTag) {
            Blade::directive($directive->closingName(), [$directive, 'closingHandler']);
        }
    }
}
