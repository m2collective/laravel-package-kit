<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\Support\Providers\Traits;

use Illuminate\Support\Facades\Blade;
use M2Collective\PackageKit\View\Directives\DirectiveInterface;
use M2Collective\PackageKit\View\Directives\Tags\ClosingTagInterface;
use M2Collective\PackageKit\View\Directives\Tags\LogicalTagInterface;
use M2Collective\PackageKit\View\Directives\Tags\OpeningTagInterface;

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
     * @param DirectiveInterface $directive
     * @return void
     */
    private function registerDirective(DirectiveInterface $directive) : void
    {
        if($directive instanceof OpeningTagInterface) {
            Blade::directive($directive->openingName(), [$directive, 'openingHandler']);
        }

        if($directive instanceof LogicalTagInterface) {
            Blade::directive($directive->logicalName(), [$directive, 'logicalHandler']);
        }

        if($directive instanceof ClosingTagInterface) {
            Blade::directive($directive->closingName(), [$directive, 'closingHandler']);
        }
    }
}
