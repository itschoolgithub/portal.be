<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    public function index() {
        return Article::select([
            'id',
            'title',
            'image'
        ])->get();
    }

    public function show(Article $article) {
        return $article;
    }

    public function store(StoreArticle $request) {
        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->input('image')
        ]);
        return [
            'success' => true
        ];
    }

    public function update(StoreArticle $request, Article $article) {
        $article->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->input('image')
        ]);
        return [
            'success' => true
        ];
    }

    public function delete(Article $article) {
        $article->delete();
        return [
            'success' => true
        ];
    }
}
