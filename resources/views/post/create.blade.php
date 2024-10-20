<x-shop-layout>
    <form action='/shop/post/create' method='POST'>
        @csrf
        <p>告知文：</p>
        <textarea name="post[text]" placeholder="例：薔薇のアレンジメントを作成しました"></textarea><br>
        <input type="submit"></input>
    </form>
    


</x-shop-layout>