<?php
declare(strict_types=1);

namespace M2Collective\PackageTool\Support\Traits;

use Illuminate\Support\Facades\Blade;
use M2Collective\PackageTool\View\Contracts\Directive;

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
        Blade::directive($directive->openingTag(), [$directive, 'openingHandler']);
        Blade::directive($directive->logicalTag(), [$directive, 'logicalHandler']);
        Blade::directive($directive->closingTag(), [$directive, 'closingHandler']);
    }
}
