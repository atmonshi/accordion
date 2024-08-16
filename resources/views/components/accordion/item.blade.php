@props([
    'activeAccordion' => 1,
    'isIsolated' => false,
    'isSlidable' => false,
    'onlyOne' => false,
    'icon' => null,
    'label' => '',
    'badge' => null,
    'badgeColor' => null,
])

<div

    @class([
       ($isSlidable ? 'rounded-lg ring-1 ring-gray-950/10 dark:ring-white/20' : ''),
      ])

    x-data="{
        id: $id('accordion'),
        @if($isIsolated) activeAccordion: 'accordion-{{ $activeAccordion }}', @endif
    }"

    :x-on:form-validation-error.window="
        $nextTick(() => {
            let error = $el.querySelector('[data-validation-error]');

            if (! error) {
                return
            }

            setActiveAccordion($id('accordion'));
        })
    "

    x-show="()=> {

        if (onlyOne) {
            return activeAccordion == id;
        }

        return true;

    }"

    class="fi-accordion-item group">

    <div
        @class([
        ($isSlidable ? 'flex gap-2 items-center' : ''),
       ])
    >

        <div x-show="onlyOne">
            <button type="button"
                    class="group relative inline-block overflow-hidden rounded-full border border-gray-100 bg-gray-200 text-sm font-medium text-slate-800 hover:text-violet-600 focus:outline-none focus:ring active:bg-indigo-600 active:text-white"
                    x-on:click="backToOther()"
            >
                <span class="ease absolute left-0 top-0 h-0 w-0 border-t-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
                <span class="ease absolute right-0 top-0 h-0 w-0 border-r-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>
                <span class="ease absolute bottom-0 right-0 h-0 w-0 border-b-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
                <span class="ease absolute bottom-0 left-0 h-0 w-0 border-l-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>

                @svg('heroicon-m-chevron-left','w-8 h-8 duration-200 ease-out')
            </button>
        </div>

        <button
                type="button"

                @click="()=> {

                    if (!onlyOne) {
                        setActiveAccordion(id);
                    }

                }"
                class="flex items-center justify-between w-full p-4 text-start select-none"

                @if(!$isSlidable)
                :class="{
                    'bg-gray-100 dark:bg-gray-800': activeAccordion == id,
                    'bg-white dark:bg-gray-800/50': activeAccordion != id,
                 }"
                @endif
        >
            <span
                @if(!$isSlidable)
                :class="{
                    'text-primary-600 dark:text-primary-500': activeAccordion == id ,
                    'text-gray-500 dark:text-white/70': activeAccordion != id
                }"
                @endif
                @class([
                    'flex gap-2 font-medium items-center justify-center',
                    ($isSlidable ? '' : 'text-gray-500 group-hover:text-primary-600')
                ])
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
                @if($isSlidable)
                    @svg('heroicon-m-chevron-right','w-4 h-4 duration-200 ease-out')
                @else
                    @svg('heroicon-m-chevron-down','w-4 h-4 duration-200 ease-out')
                @endif
            </span>
        </button>

    </div>


    <div class="p-4" x-show="activeAccordion == id" x-collapse x-cloak>
        {{ $slot }}
    </div>
</div>
