<?php

namespace GIS\EditableNumbersBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\EditableNumbersBlock\Livewire\Admin\Types\NumbersWire;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class EditableNumbersBlockServiceProvider extends ServiceProvider
{
    use ExpandBlocksTrait;

    public function register(): void
    {
        // Config
        $this->mergeConfigFrom(__DIR__ . "/config/editable-numbers-block.php", 'editable-numbers-block');
    }

    public function boot(): void
    {
        // Views
        $this->loadViewsFrom(__DIR__ . "/resources/views", "enb");

        // Livewire
        $this->addLivewireComponents();

        // Конфиг
        $this->expandConfiguration();
    }

    protected function addLivewireComponents(): void
    {
        $component = config("editable-numbers-block.customNumbersComponent");
        Livewire::component(
            "enb-numbers",
            $component ?? NumbersWire::class
        );
    }

    protected function expandConfiguration(): void
    {
        $enb = app()->config["editable-numbers-block"];
        $this->expandBlocks($enb);
    }
}
