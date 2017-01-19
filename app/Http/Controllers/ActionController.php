<?php

namespace App\Http\Controllers;

use App\Actions;
use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{


    public function likeCount($article)
    {
        $userId = Auth::user()->id;
        $exist = DB::table('actions')->where('user_id', $userId)->where('article_id', $article)->where('type', 'like')->get();
        //dd($exist);
       // return $exist;
        if (count($exist)!=0) {
            DB::table('actions')->where('user_id', $userId)->where('article_id', $article)->where('type', 'like')->delete();
            return "like";
        }
        $action = new Actions();
        $action->user_id = $userId;
        $action->article_id = $article;
        $action->type = 'like';
        $action->value = '';
        // dd($action);
        $action->save();
        $count = DB::table('actions')->where('article_id', $article)->where('type', 'like')->count();
        // return redirect(url('/home'));
        return "unlike";
    }

    public function comment($article)
    {

        $action = new Actions();
        $action->user_id = Auth::user()->id;
        $action->article_id = $article;
        $action->type = 'comment';
        $action->value = 'some random comment';
        // dd($action);
        $action->save();
        return redirect(url('/home'));

    }
}
