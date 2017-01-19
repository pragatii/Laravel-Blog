<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests\ArticleCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtilcleController extends Controller
{

    public function showHome()
    {
        //return 'kjfhkjsdflkJ';
        if (Auth::check()) {
            $articles = Articles::all();
            $likes=DB::table('actions')->where('type','like')->where('article_id',$articles)->count();

            // dd($articles[0]->users->name);
            return view('articles.show', compact('articles','likes'));
        } else {
            // dd('kjsdfhkjsdhnf');
            return redirect(url('/login'));
        }
    }


    public function showTimeline()
    {

        $user = Auth::user();
        //dd($user->articles);
        //$articles = $user->articles;

        return view('articles.timeline', compact('user'));
    }

    public function createArticle(ArticleCreateRequest $request)
    {

        $title = $request->get('title');
        $content = $request->get('content');
        $userId = Auth::user()->id;
        //dd([$content, $title, $userId]);
        $article = new Articles();
        $article->title = $title;
        $article->content = $content;
        $article->user_id = $userId;

        $article->save();


        /* Articles::create(
             [
                 'user_id' => $userId,
                 'title' => $title,
                 'content' => $content
             ]
         );*/
        return redirect(url('/timeline'));
    }

    public function edit(Articles $article)
    {
        //dd('kjsdfhkjsdh');
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Articles $article)
    {
      //  dd('hdfjwdhfo');
        $article->title= $request->get('title');
        $article->content= $request->get('content');
        $article->save();
       // dd('hdfjwdhfo');

        return redirect(url('/timeline'));
    }

}
