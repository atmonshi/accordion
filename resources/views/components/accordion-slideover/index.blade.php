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

    class="fi-accordion w-full flex flex-col gap-y-4"
>
    {{ $slot }}
</div>
