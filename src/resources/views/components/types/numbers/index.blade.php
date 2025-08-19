@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @php
        $perCol = config("editable-numbers-block.perCol");
        if ($isFullPage) {
            $gridClass = "lg:w-1/3";
            if ($perCol === 4) { $gridClass .= " 2xl:w-1/4"; }
        } else {
            $gridClass = "";
        }
    @endphp

    @if ($block->render_title)
        <x-tt::h2 class="mb-indent">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div class="row">
        @foreach($block->items as $item)
            <div class="col w-full md:w-1/2 {{ $gridClass }} mb-indent">
                <x-enb::types.numbers.item :$item />
            </div>
        @endforeach
    </div>
@endif
