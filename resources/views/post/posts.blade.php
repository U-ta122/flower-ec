<x-app-layout>
    <p>掲示板</p>
        @foreach ($posts as $post) 
        {{-- 手前の$はテーブルを参照してるっぽい --}}
        <div class='m-5'>
            <p>{{$post->text}}</p>
        </div>
        @endforeach

</x-app-layout>