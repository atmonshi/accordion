@props([
    'activeAccordion' => 1,
    'slideOverDirection' => 'right',
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
    @if($slideOverDirection == 'right')
        <style>
            .fi-accordion-item-slide {
                animation: fi-accordion-item-slide-right 0.3s ease-out;
            }
            @keyframes fi-accordion-item-slide-right {
                0% { opacity: 0; transform: translateX(100%); }
                100% { opacity: 1; transform: translateX(0); }
            }
        </style>
    @else
        <style>
            .fi-accordion-item-slide {
                animation: fi-accordion-item-slide-left 0.3s ease-out;
            }
            @keyframes fi-accordion-item-slide-left {
                0% { opacity: 0; transform: translateX(-100%); }
                100% { opacity: 1; transform: translateX(0); }
            }
        </style>
    @endif

    {{ $slot }}
</div>
