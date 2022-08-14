<?php

namespace EniumCriacaoSites\Types\Filters;

use EloquentFilter\ModelFilter;

class TypeFilter extends ModelFilter
{
    public $relations = [];

    public function search($search)
    {
        return $this->where(function ($query) use ($search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }

    public function group($group)
    {
        return $this->where('group', $group);
    }
}