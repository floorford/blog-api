<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    // make sure tags are up to date
    $this->resource->load("tags");

    return [
      "name" => $this->name
    ]; // this doesnt work for individual articles only for all the articles
}
