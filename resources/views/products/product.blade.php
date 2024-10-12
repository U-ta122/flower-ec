<x-app-layout>
    <p>商品名：</p>
    <p>{{$product->name}}</p>
    <p>説明文：</p>
    <p>{{$product->text}}</p>
    <p>価格：</p>
    <p>{{$product->price}} 円</p>
    <div>
        <img src="{{ $product->image_url }}" alt="画像が読み込めません。">
    </div>

</x-app-layout>