<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;

class Fullsearch extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        \App\Models\User::class,
        \App\Models\Post::class,
    ];
  public function shouldBeSearchable()
    {
        // Check if the class uses the Searchable trait before calling shouldBeSearchable
        if (array_key_exists(Searchable::class, class_uses($this->model))) {
            return $this->model->shouldBeSearchable();
        }
    }
  
}