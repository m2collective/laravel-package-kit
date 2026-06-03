<?php
declare(strict_types=1);

namespace M2Collective\PackageKit\View\Contracts\Directives;

use M2Collective\PackageKit\View\Contracts\Directive;
use M2Collective\PackageKit\View\Contracts\Directives\Tags\ClosingTag;
use M2Collective\PackageKit\View\Contracts\Directives\Tags\LogicalTag;
use M2Collective\PackageKit\View\Contracts\Directives\Tags\OpeningTag;

interface ConditionalDirective extends Directive, ClosingTag, OpeningTag, LogicalTag
{

}
