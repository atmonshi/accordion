@props([
    'activeAccordion' => 1,
    'isIsolated' => false,
    'icon' => null,
    'label' => '',
    'badge' => null,
    'badgeColor' => null,
])
<div
    x-data="{
        id: $id('accordion'),
        @if($isIsolated) activeAccordion: 'accordion-{{ $activeAccordion }}', @endif
    }"

    :x-on:form-validation-error.window="
        $nextTick(() => {
            let error = $el.querySelector(\'[data-validation-error]\')
            if (! error) {
                return
            }

            setActiveAccordion($id('accordion'));
        })
    "
    class="fi-accordion-item group"
>
    <button
        type="button"
        @click="setActiveAccordion(id)"
        class="flex items-center justify-between w-full p-4 text-start select-none"
        :class="{
            'bg-gray-100 dark:bg-gray-800': activeAccordion == id,
            'bg-white dark:bg-gray-800/50': activeAccordion != id,
         }"
    >
        <span
            :class="{
                'text-primary-600 dark:text-primary-500': activeAccordion == id ,
                'text-gray-500 dark:text-white/70': activeAccordion != id
            }"
            class="flex gap-2 font-medium items-center justify-center text-gray-500 group-hover:text-primary-600"
        >
            @if ($icon !== null)
                <x-filament::icon
                    :icon="$icon"
                    class="fi-accordion-item-icon h-6 w-6 shrink-0 transition duration-75"
                />
            @endif
            {{ $label }}

            @if (filled($badge))
                <x-filament::badge :color="$badgeColor" size="sm" class="w-max">
                    {{ $badge }}
                </x-filament::badge>
            @endif
        </span>
        <span :class="{ 'rotate-180': activeAccordion == id }">
            @svg('heroicon-m-chevron-down','w-4 h-4 duration-200 ease-out')
        </span>
    </button>
    <div x-show="activeAccordion == id" x-collapse x-cloak>
        {{ $slot }}
    </div>
</div>
