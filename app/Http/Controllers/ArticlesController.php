<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() { //index

        $articles = Article::latest()->paginate();

        return view('articles.index', compact('articles'));

    }
   
    public function show(Article $article) { //show

        return view('articles.show', ['article' => $article]);

    }


    public function create() { //create

        return view('articles.create');

    }


    public function store() { //store

        Article::create($this->validateArticle());

        return redirect(route('articles.index'));
    }
    

    public function edit(Article $article) { //edit

        return view('articles.edit', compact('article'));

    }


    public function update(Article $article) { //update

        $article->update($this->validateArticle());

        return redirect($article->path());
    }

   
    protected function validateArticle() {

        return request()->validate([
            'title' => 'required | string',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

    }


}
