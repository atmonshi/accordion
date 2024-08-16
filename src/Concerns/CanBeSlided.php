<?php

namespace LaraZeus\Accordion\Concerns;

use Closure;

trait CanBeSlided
{
    protected bool | Closure $isSlidable = true;
    protected string | Closure $slideDirection = 'right';

    public function slide(string | null $slideDirection = null): static
    {
        $this->isSlidable = true;

        if ($slideDirection) {
            $this->slideDirection = $slideDirection;
        }

        return $this;
    }

    public function slideRight()
    {
        return $this->slide('right');
    }

    public function slideLeft()
    {
        return $this->slide('left');
    }

    public function isSlidable(): bool
    {
        return $this->evaluate($this->isSlidable);
    }
}
