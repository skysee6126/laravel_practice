<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{
    public function index()
    {
    $articles = Article::orderBy('created_at', 'asc')->paginate(3);
    return view('articles', [
    'articles' => $articles
    ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'expired' => 'required',
            ]);
            //バリデーション：エラー
            if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
            }
            //データ更新
            $articles = Article::find($request->id);
            $articles->item_name = $request->item_name;
            $articles->item_number = $request->item_number;
            $articles->item_amount = $request->item_amount;
            $articles->expired = $request->expired;
            $articles->save();
            return redirect('/');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required | min:1 | max:3',
            'item_amount' => 'required | max:6',
            'expired' => 'required',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
    
    $articles = new Article;
    $articles->item_name = $request->item_name;
    $articles->item_number = $request->item_number;
    $articles->item_amount = $request->item_amount;
    $articles->expired = $request->expired;
    $articles->save(); //「/」ルートにリダイレクト
    return redirect('/');
    }

    public function edit(Article $articles)
    {
    return view('articlesedit', [
    'article' => $articles
    ]);
    }

    public function destroy(Article $article)
    {
    $article->delete();
    return redirect('/');
    }
}


// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Article $article)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Article $article)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Article $article)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Article  $article
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Article $article)
//     {
//         //
//     }
// }
