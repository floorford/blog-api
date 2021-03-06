<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleListResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $this->resource->load("tags");

    return [
      "id" => $this->id,
      "title" => $this->title,
      "tags" => $this->tags->pluck("name"), // just return a list of tag names
    ];
  }
}
