<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
trait UsesUuid
{
    /** @var string */
    private $uuidColumn = "uuid";

    /**
     * Boot the trait, adding a creating observer.
     * When persisting a new model instance, we resolve the UUID field, then set
     * @return void
     */
    public static function bootUsesUuid()
    {
        static::creating(function ($model) {

            $model->attributes[$model->uuidColumn] = Str::orderedUuid()->toString();
        });
    }


}
