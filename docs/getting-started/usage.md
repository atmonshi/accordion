---
title: Usage
weight: 4
---

## In Forms

to use @zeus accordion in your forms:

@blade
<x-auto-screenshot name="accordion/accordion-form" alt="using accordion component in forms" />
@endblade

```php
\LaraZeus\Accordion\Forms\Accordions::make('Options')
    ->activeAccordion(2)
    ->isolated()

    ->accordions([
        \LaraZeus\Accordion\Forms\Accordion::make('main-data')
            ->columns()
            ->label('User Details')
            ->icon('iconpark-commentone')
            ->badge('New Badge')
            ->badgeColor('info')
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
            ]),
    ]),
,
```

## In Infolist

to use @zeus accordion in your infolist:

@blade
<x-auto-screenshot name="accordion/accordion-infolist" alt="using accordion component in infolist" />
@endblade

```php
\LaraZeus\Accordion\Infolists\Accordions::make('Options')
    ->activeAccordion(2)
    ->isolated()

    ->accordions([
        \LaraZeus\Accordion\Infolists\Accordion::make('main-data')
            ->columns()
            ->label('User Details')
            ->icon('iconpark-commentone')
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
            ]),
    ]),
,
```
