<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <x-app-layout>
        <x-slot name="header">Index</x-slot>
        <body>
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="content__title">
                        <h2>タイトル</h2>
                        <input type='text' name='post[title]' value='{{ $post->title }}'>
                        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                    <div class="content__body">
                        <h2>本文</h2>
                        <input type='text' name='post[body]' value='{{ $post->body }}'>
                        <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                    </div>
                    <input type="submit" value="保存">
                </form>
                <div class="footer">
                    <a href="/posts/{{ $post->id }}">戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>