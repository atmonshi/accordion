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

    <div x-show="activeAccordion !== id">
        @include('zeus-accordion::components.accordion-slideover.item-header')
    </div>

    <div
        x-show="activeAccordion == id"
        x-transition:enter="accordion-item-slide-right-active">

        @include('zeus-accordion::components.accordion-slideover.item-header')

        <div class="p-4" x-show="activeAccordion == id">
            {{ $slot }}
        </div>

    </div>

</div>
