<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticlesEditRequest;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $articles = Article::all();
        return view('articles.index', compact('articles'), [
            'pageTitle' => "Article List",
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create', [
            'pageTitle'=> "Article Create",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'text' => ['nullable', 'max:200'],
        ]);

        $article = Article::create($data);
        
        if(!$article){
            return abort(403);
        }

        return redirect()->route('articles.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $article = Article::find($id);

        return view('articles.show', [
            'pageTitle' => $article['title'],
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', [
            'pageTitle' => "Article Edit",
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesEditRequest $request, $id)
    {
        $article = Article::where('id', $id)->update([
            'title'=>$request['title'],
            'text'=>$request['text'],
        ]); 

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id)->delete();
        return redirect()->route('articles.index');
    }
}
