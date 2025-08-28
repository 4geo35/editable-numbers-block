<x-tt::modal.dialog wire:model="displayData">
    <x-slot name="title">
        {{ $itemId ? "Редактировать элемент" : "Добавить элемент" }}
    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="{{ $itemId ? 'update' : 'store' }}"
              class="space-y-indent-half" id="numbersBlockDataForm-{{ $block->id }}">
            <div>
                <label for="numbersTitle-{{ $block->id }}" class="inline-block mb-2">
                    Заголовок
                </label>
                <input type="text" id="numbersTitle-{{ $block->id }}"
                       class="form-control {{ $errors->has("title") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="title">
                <x-tt::form.error name="title"/>
            </div>

            <div>
                <label for="numbersDescription-{{ $block->id }}" class="flex justify-start items-center mb-2">
                    Описание
                    @include("tt::admin.description-button", ["id" => "numbersHidden-{$block->id}"])
                </label>
                @include("tt::admin.description-info", ["id" => "numbersHidden-{$block->id}"])
                <textarea id="numbersDescription-{{ $block->id }}" class="form-control !min-h-52 {{ $errors->has('description') ? 'border-danger' : '' }}"
                          rows="10"
                          wire:model.live="description">
                        {{ $description }}
                    </textarea>
                <x-tt::form.error name="description" />

                <div class="prose prose-sm mt-indent-half">
                    {!! \Illuminate\Support\Str::markdown($description) !!}
                </div>
            </div>

            <div class="flex items-center space-x-indent-half">
                <button type="button" class="btn btn-outline-dark" wire:click="closeData">
                    Отмена
                </button>
                <button type="submit" form="numbersBlockDataForm-{{ $block->id }}" class="btn btn-primary" wire:loading.attr="disabled">
                    {{ $itemId ? "Обновить" : "Добавить" }}
                </button>
            </div>
        </form>
    </x-slot>
</x-tt::modal.dialog>
