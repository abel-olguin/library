<?php

namespace App\Models\Traits;

trait IsQueriable
{

    public function scopeQueriable($query, $search, $order, $perPage)
    {
        return $query->search($search)->order($order)->paginate($perPage);
    }

    public function scopeSearch($query, $search)
    {
        if($search){
            $query->where(function($query)use ($search){
                foreach ($this->searchBy as $item) {
                    $query->orWhere($item, 'LIKE', "%$search%");
                }
            });
        }
        return $query;
    }

    public function scopeOrder($query, $order)
    {
        if($order){
            $orderDirection = 'ASC';
            if(str($order)->startsWith('-')){
                $orderDirection = 'DESC';
                $order = str($order)->substr(1);
            }
            $query->orderBy($order, $orderDirection);
        }
        return $query;
    }
}
