<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
use App\Http\Requests\PostRequest; //useする
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
 
class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //return $post->get(); $postの中身を戻り値にする。
        //return view('posts.index') -> with(['posts' => $post->get()]);  全件取得
        //return view('posts.index')->with(['posts' => $post->getByLimit()]);  //件数取得
        //blade内で使う変数'posts'と設定. 'posts'の中身にgetを使い, インスタンス化した$postを代入
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);  //件数取得
        //getPaginateByLimit()はPost.phpで定義したメソッドです。
    }
    
    /**
     * 特定IDのpostを表示する
     * 
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
     public function show(Post $post)
     {
         return view('posts.show')->with(['post' => $post]);
         //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
         
     }
     
     public function create()
    {
        return view('posts.create');
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
}
