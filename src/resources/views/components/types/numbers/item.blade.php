@props(["item"])
<div class="h-full flex flex-col pr-18">
    <div class="text-primary border-b border-stroke pb-1.5 text-[66px] font-black leading-[110%]">
        {{ $item->title }}
    </div>
    @if ($item->recordable->description)
        <div class="prose prose-lg max-w-none prose-p:leading-6 mt-indent-half">
            {!! $item->recordable->markdown !!}
        </div>
    @endif
</div>
