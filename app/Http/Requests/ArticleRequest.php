<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      "title" => ["required", "string", "max:100"],
      "article" => ["required", "string", "min:50"],
      "tags" => ["required", "array"], // check tags is an array
      "tags.*" => ["string", "max:30"], // check members of tags are strings
    ];
  }
}
