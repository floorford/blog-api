<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Article extends Model
{
  // Only allow the title and article field to get updated via mass assignment
  protected $fillable = ["title", "article"];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  public function setTags(Collection $tags)
  {
    // update the pivot table with tag IDs
    $this->tags()->sync($tags->pluck("id")->all());
    return $this;
  }
}
