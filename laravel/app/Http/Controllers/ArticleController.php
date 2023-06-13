<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticles(Request $request){
        $code = $request->get('code');
        $name = $request->get('name');
        $tag = $request->get('tag');

        $query = Article::query();
        if ($code)
        {
            $query->where('code', '=', $code);
        }
        if ($name)
        {
            $query->where('name', '=', $name);
        }
        if ($tag)
        {
            $query
                ->select('articles.id', 'articles.name', 'articles.code', 'articles.content', 'articles.created_at', 'articles.updated_at')
                ->rightjoin('article_tag','articles.id','article_tag.article_id')
                ->rightjoin('tags','article_tag.tag_id','tags.id')
                ->where('tags.name', '=', $tag);
        }
        $articles = $query->paginate(10);
        return view('articles', compact('articles'));
    }

    public function  getArticleByCode(string $code){
        $article = Article::where("code", "=", $code);
        if(is_null($article)) {
            abort(404);
        }
        $tags = DB::table('tags')
                    ->select('tags.name', 'tags.code')
                    ->rightjoin('article_tag','tags.id','article_tag.tag_id')
                    ->rightjoin('articles','article_tag.article_id','articles.id')
                    ->where('articles.code','=', $code)
                    ->orderBy('tags.name')->get();
//        dd($article->get());
        $article = $article->first();
        return view('article', compact('article', 'tags'));
    }
}
