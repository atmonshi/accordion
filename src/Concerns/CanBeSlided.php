<?php

namespace LaraZeus\Accordion\Concerns;

use Closure;

trait CanBeSlided
{
    protected bool | Closure $isSlideOver = false;
    protected string | Closure $slideOverDirection = 'right';

    public function slideOver(string | null $slideOverDirection = null): static
    {
        $this->isSlideOver = true;

        if ($slideOverDirection) {
            $this->slideOverDirection = $slideOverDirection;
        }

        return $this;
    }

    public function slideOverRight()
    {
        return $this->slideOver('right');
    }

    public function slideOverLeft()
    {
        return $this->slideOver('left');
    }

    public function isSlideOver(): bool
    {
        return $this->evaluate($this->isSlideOver);
    }
}
