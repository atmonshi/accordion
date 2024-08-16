@props([
    'activeAccordion' => 1,
])
<div x-data="{
        activeAccordion: 'accordion-{{ $activeAccordion }}',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion == id) ? '' : id
        }
    }"
     class="fi-accordion rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 relative w-full mx-auto overflow-hidden divide-y divide-gray-200 dark:divide-white/5"
>
    {{ $slot }}
</div>