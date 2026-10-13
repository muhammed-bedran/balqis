<article class="card">
    <div class="thumb">
        @if ($product->image)
            <img src="">
        @else
            💡
        @endif
    </div>
    <div class="info">
        <b>{{ $product->name }}</b>
        @if ($product->category)
            <small>{{ $product->category->name }}</small>
        @elseif ($product->store)
            <small>{{ $product->store->name }}</small>
        @endif
        <div class="row">
            <span class="price">{{ $product->price }}ل.س</span>
            <button class="add" data-id="{{ $product->id }}">اضافة</button>
        </div>
    </div>
</article>
