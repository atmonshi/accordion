@props([
    'activeAccordion' => 1,
    'onlyOne' => false,
    'icon' => null,
    'label' => '',
    'badge' => null,
    'badgeColor' => null,
])

<div
    x-data="{
        id: $id('accordion')
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

    class="rounded-xl ring-1 ring-gray-950/10 dark:ring-white/20 fi-accordion-item group">

    <div class="flex gap-4 items-center justify-between w-full p-4 text-start select-none">

        <button type="button" x-show="onlyOne"
                class="group relative inline-block overflow-hidden rounded-full border border-gray-100 bg-gray-200 text-sm font-medium text-slate-800 hover:text-violet-600 focus:outline-none focus:ring active:bg-indigo-600 active:text-white"
                x-on:click="backToOther()"
        >
            <span class="ease absolute left-0 top-0 h-0 w-0 border-t-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
            <span class="ease absolute right-0 top-0 h-0 w-0 border-r-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>
            <span class="ease absolute bottom-0 right-0 h-0 w-0 border-b-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
            <span class="ease absolute bottom-0 left-0 h-0 w-0 border-l-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>

            @svg('heroicon-m-chevron-left','w-6 h-6 duration-200 ease-out')
        </button>

        <button type="button"
                class="flex items-center justify-between w-full text-start select-none"

                @click="()=> {
                if (!onlyOne) {
                    setActiveAccordion(id);
                }
            }">
            <span class="flex gap-2 font-medium items-center justify-center">
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
            <span x-show="activeAccordion !== id">
                 @svg('heroicon-m-chevron-right','w-4 h-4 duration-200 ease-out')
            </span>
        </button>
    </div>


    <div class="p-4" x-show="activeAccordion == id">
        {{ $slot }}
    </div>

</div>
