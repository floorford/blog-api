<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public $timestamps = false; // don't need timestamps
  protected $fillable = ["name"]; // name should be fillable

  public function articles()
  {
    return $this->belongsToMany(Article::class);
  }
  
  // accepts the array of strings from the request
  public static function parse(array $tags)
  {
    // turns into a collection and maps over
    return collect($tags)->map(function ($tag) {
      // remove any blank spaces either side
      $string = trim($tag);
      return static::makeTag($string);
    });
  }

  private static function makeTag($string)
  {
    // check if tag already exists
    $exists = Tag::where("name", $string)->first();

    // if tag exists return it, otherwise create a new one
    return $exists ? $exists : Tag::create(["name" => $string]);
  }
}
