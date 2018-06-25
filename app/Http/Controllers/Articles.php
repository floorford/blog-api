<?php

namespace App\Http\Controllers;

// make sure you add this near the top, undereath the namespace declaration
use App\Article;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleListResource;

use Illuminate\Http\Request;

class Articles extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
  {
    // needs to return multiple articles
    // so we use the collection method
    return ArticleListResource::collection(Article::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // get post request data for title and article
    $data = $request->only(["title", "article"]);

    // create article with data and store in DB
    $article = Article::create($data);

    return new ArticleResource($article);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   // the id gets passed in for us
  public function show(Article $article)
  {
    return new ArticleResource($article);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Article $article)
  {
    // get the request data
    $data = $request->only(["title", "article"]);

    // update the article
    $article->fill($data)->save();

    return new ArticleResource($article);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    $article->delete();

    // use a 204 code as there is no content in the response
    return response(null, 204);
  }
}
