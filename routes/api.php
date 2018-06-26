<?php

// use the post method
// when the use request /articles - don't need the forward slash
// which will call the store method of the Articles controller


// we can group all our articles routes together
$router->group(["prefix" => "articles"], function ($router) {
  $router->post("", "Articles@store");
  $router->get("", "Articles@index");
  // {article} is a url parameter representing the id we want
  $router->get("{article}", "Articles@show");
  $router->put("{article}", "Articles@update");
  $router->delete("{article}", "Articles@destroy");
  $router->post("{article}/comments", "Comments@store");
  $router->get("{article}/comments", "Comments@index");
});
