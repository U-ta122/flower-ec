<x-app-layout>
    <h1>商品一覧</h1>
    <div class='flex'>
        @foreach ($products as $product) 
            {{-- 手前の配列をfor文する --}}
            <div class='mx-5'>
                <h2 class='title'>
                    <a href="/index/{{ $product->id }}">{{ $product->name }}</a>
                </h2>
                <img src="{{ $product->image_url }}" alt="商品画像" width="193" height="130"/>
                <a href="/chat/{{ $product->id }}">{{ $product->name }}に対するチャットする</a>
            </div>
        @endforeach
    </div>
</x-app-layout>