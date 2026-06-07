<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Directives\Types;

use M2Collective\PackageKit\View\Directives\Contracts\ClosingTag;
use M2Collective\PackageKit\View\Directives\Contracts\LogicalTag;
use M2Collective\PackageKit\View\Directives\Contracts\OpeningTag;

abstract class BooleanDirective implements OpeningTag, ClosingTag, LogicalTag
{

}
