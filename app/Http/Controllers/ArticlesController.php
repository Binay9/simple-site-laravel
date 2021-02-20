<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index() { //index

        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else{
            $articles = Article::latest()->paginate();

        }


        return view('articles.index', compact('articles'));

    }
   
    public function show(Article $article) { //show

        //  function tagNames($article) {

        //     return $article->tags->pluck('name');
        // }

        return view('articles.show', ['article' => $article]);

    }


    public function create() { //create

        return view('articles.create', [
            'tags' => Tag::all()
        ]);

    }


    public function store() { //store

        dd(request()->all());

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
