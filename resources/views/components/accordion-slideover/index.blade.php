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
    <style>
        .accordion-item.accordion-item-slide-right.active {
            animation: accordion-item-slide-right 0.3s ease-out;
        }

        .accordion-item-slide-right-active {
            animation: accordion-item-slide-right 0.3s ease-out;
        }

        .accordion-item-slide-left-active {
            animation: accordion-item-slide-left 0.3s ease-out;
        }

        @keyframes accordion-item-slide-right {
            0% { opacity: 0; transform: translateX(100%); }
            100% { opacity: 1; transform: translateX(0); }
        }
        @keyframes accordion-item-slide-left {
            0% { opacity: 0; transform: translateX(-100%); }
            100% { opacity: 1; transform: translateX(0); }
        }
    </style>

    {{ $slot }}
</div>
