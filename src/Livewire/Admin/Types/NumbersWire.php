<?php

namespace GIS\EditableNumbersBlock\Livewire\Admin\Types;
use GIS\EditableBlocks\Interfaces\SimpleItemActionsInterface;
use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableBlocks\Traits\PlaceholderBlockTrait;
use GIS\EditableBlocks\Traits\SimpleItemActionsTrait;
use Illuminate\View\View;
use Livewire\Component;

class NumbersWire extends Component implements SimpleItemActionsInterface
{
    use EditBlockTrait, SimpleItemActionsTrait, CheckBlockAuthTrait, PlaceholderBlockTrait;

    public function rules(): array
    {
        return [
            "title" => ["required", "string", "max:150"],
            "description" => ["nullable", "string"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            "title" => "Заголовок",
            "description" => "Описание",
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view("enb::livewire.admin.types.numbers-wire", compact("items"));
    }
}
