<x-app-layout>
    <p>商品名：</p>
    <p>{{$product->name}}</p>
    <p>説明文：</p>
    <p>{{$product->text}}</p>
    <p>価格：</p>
    <p>{{$product->price}} 円</p>
    <div>
        <img src="{{ $product->image_url }}" alt="画像が読み込めません。"width="193" height="130">
    </div>
    <div>
        <a href="/payment/create/{{$product->id}}">購入</a>
    </div>

</x-app-layout>