<?php

namespace LaraZeus\Accordion\Forms;

use Closure;
use Filament\Forms\Components\Component;
use Filament\Support\Concerns;
use LaraZeus\Accordion\Concerns\CanBeIsolated;

class Accordions extends Component
{
    use CanBeIsolated;
    use Concerns\HasExtraAlpineAttributes;

    protected string $view = 'zeus-accordion::forms.accordions';

    protected int | Closure $activeAccordion = 1;

    final public function __construct(?string $label = null)
    {
        $this->label($label);
    }

    public static function make(?string $label = null): static
    {
        $static = app(static::class, ['label' => $label]);
        $static->configure();

        return $static;
    }

    public function activeAccordion(int | Closure $activeAccordion): static
    {
        $this->activeAccordion = $activeAccordion;

        return $this;
    }

    public function getActiveAccordion(): int
    {
        return $this->evaluate($this->activeAccordion);
    }

    public function accordions(array | Closure $accordions): static
    {
        if (is_array($accordions)) {
            $accordions = array_filter($accordions);
        }

        $this->childComponents($accordions);

        return $this;
    }
}
