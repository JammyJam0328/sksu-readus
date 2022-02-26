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

  
}