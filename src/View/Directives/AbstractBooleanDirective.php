<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives;

use M2Collective\PackageKit\View\Directives\Tags\ClosingTagInterface;
use M2Collective\PackageKit\View\Directives\Tags\LogicalTagInterface;
use M2Collective\PackageKit\View\Directives\Tags\OpeningTagInterface;

abstract class AbstractBooleanDirective implements DirectiveInterface, OpeningTagInterface, ClosingTagInterface, LogicalTagInterface
{

}
