<?php

namespace App\Http\Controllers;

// make sure you add this near the top, undereath the namespace declaration
use App\Article;

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
      // get all the articles
      return Article::all();
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

      // return the article along with a 201 status code
      return response($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // the id gets passed in for us
    public function show($id)
    {
      return Article::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // find the current article
      $article = Article::find($id);

      // get the request data
      $data = $request->only(["title", "article"]);

      // update the article
      $article->fill($data)->save();

      // return the updated version
      return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $article = Article::find($id);
      $article->delete();

      // use a 204 code as there is no content in the response
      return response(null, 204);
    }
}
