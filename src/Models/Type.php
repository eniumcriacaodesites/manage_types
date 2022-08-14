<?php

namespace EniumCriacaoSites\Types\Models;

use EloquentFilter\Filterable;
use EniumCriacaoSites\Types\Filters\TypeFilter;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use Filterable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function modelFilter()
    {
        return $this->provideFilter(TypeFilter::class);
    }
}