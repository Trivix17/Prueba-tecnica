<?php

class CommentsMovies
{
  public int | null $id;
  public string $comment;
  public int $idMovie;

  public function __construct(string $comment, int $idMovie, int | null $id)
  {
    $this->id = $id;
    $this->comment = $comment;
    $this->idMovie = $idMovie;
  }
}
