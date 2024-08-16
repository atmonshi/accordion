@props([
    'activeAccordion' => 1,
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
     class="fi-accordion rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 relative w-full mx-auto overflow-hidden divide-y divide-gray-200 dark:divide-white/5"
>

    <div x-show="onlyOne">
        <button type="button"
            class="group relative inline-block overflow-hidden rounded border border-gray-100 bg-gray-200  px-12 py-3 text-sm font-medium text-slate-800 hover:text-violet-600 focus:outline-none focus:ring active:bg-indigo-600 active:text-white"
            x-on:click="backToOther()"
        >
            <span class="ease absolute left-0 top-0 h-0 w-0 border-t-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
            <span class="ease absolute right-0 top-0 h-0 w-0 border-r-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>
            <span class="ease absolute bottom-0 right-0 h-0 w-0 border-b-2 border-violet-600 transition-all duration-200 group-hover:w-full"></span>
            <span class="ease absolute bottom-0 left-0 h-0 w-0 border-l-2 border-violet-600 transition-all duration-200 group-hover:h-full"></span>

            @svg('heroicon-m-chevron-left','w-8 h-8 duration-200 ease-out')
        </button>
    </div>

    {{ $slot }}
</div>
