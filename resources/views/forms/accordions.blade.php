@php
    $isIsolated = $isIsolated();
    $isSlideOver = $isSlideOver();
    $getActiveAccordion = $getActiveAccordion();
@endphp

<div
    wire:ignore.self
    x-cloak
    {{
        $attributes
            ->merge([
                'id' => $getId(),
                'wire:key' => "{$this->getId()}.{$getStatePath()}." . Accordions::class . '.container',
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->merge($getExtraAlpineAttributes(), escape: false)
            ->class([
               $isSlideOver ? '' : 'rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10',
            ])
    }}
>

    @if ($isSlideOver)

        <x-zeus-accordion::accordion-slideover :activeAccordion="$getActiveAccordion">
            @foreach ($getChildComponentContainer()->getComponents() as $accordion)
                <x-zeus-accordion::accordion-slideover.item
                    :label="$accordion->getLabel()"
                    :icon="$accordion->getIcon()"
                    :badge="$accordion->getBadge()"
                    :badge-color="$accordion->getBadgeColor()"
                    :activeAccordion="$getActiveAccordion">
                    {{ $accordion }}
                </x-zeus-accordion::accordion-slideover.item>
            @endforeach
        </x-zeus-accordion::accordion-slideover>

    @else

    <x-zeus-accordion::accordion :activeAccordion="$getActiveAccordion">
        @foreach ($getChildComponentContainer()->getComponents() as $accordion)
            <x-zeus-accordion::accordion.item
                    :label="$accordion->getLabel()"
                    :icon="$accordion->getIcon()"
                    :badge="$accordion->getBadge()"
                    :badge-color="$accordion->getBadgeColor()"
                    :isIsolated="$isIsolated"
                    :activeAccordion="$getActiveAccordion">
                {{ $accordion }}
            </x-zeus-accordion::accordion.item>
        @endforeach
    </x-zeus-accordion::accordion>

    @endif

</div>
