@props([
    'activeAccordion' => 1,
    'isSlidable' => false,
])
<div x-data="{
        activeAccordion: 'accordion-{{ $activeAccordion }}',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id;
            this.onlyOne = true;
        },
        onlyOne: false,
        backToOther() {
            this.activeAccordion = 0;
            this.onlyOne = false;
        }
    }"
     @class([
     'fi-accordion relative w-full mx-auto overflow-hidden',
     ($isSlidable ? 'flex flex-col gap-y-4' : 'rounded-xl bg-white shadow-sm dark:bg-gray-900 dark:ring-white/10 ring-1 ring-gray-950/5 divide-y divide-gray-200 dark:divide-white/5'),
    ])
>
    {{ $slot }}
</div>
