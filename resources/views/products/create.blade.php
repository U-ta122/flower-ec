<x-app-layout>
    <form action="/shop/products" method="POST" enctype="multipart/form-data">
        @csrf
        <p>商品名：</p>
        <input type="text" name="product[name]" placeholder="商品名"/><br>
        <p>説明文：</p>
        <textarea name="product[text]" placeholder="例：薔薇のアレンジメントです"></textarea><br>
        <p>価格：</p>
        <input type="number" name="product[price]" placeholder="3000"/><br>
        <input type="hidden" name="product[state]" value=0>
        <input type="checkbox" name="product[state]" value=1>販売状態にする</input><br>
        <div class="image">
            <input type="file" name="image">
        </div>
        <input type="submit" value="実行"/>
        </form>

</x-app-layout>