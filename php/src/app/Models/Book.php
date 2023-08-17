<?php

namespace App\Models;

use App\Enums\BookStatus;
use App\Models\Traits\IsQueriable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes, IsQueriable;

    protected $casts = [
      'status' => BookStatus::class
    ];
    protected $hidden = ['authors'];
    protected $searchBy = ['name'];

    #relations

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function authors()
    {
        return $this->belongsToMany( Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    #attributes
    public function category():Attribute
    {
        return new Attribute(get: fn() => $this->categories()->latest()->first());
    }

    public function author():Attribute
    {
        return new Attribute(get: fn() => $this->authors()->latest()->first());
    }


    public function latestLoan():Attribute
    {
        return new Attribute(get: fn()=>$this->loans()->latest()->first());
    }

    public function color():Attribute
    {
        return new Attribute(get:function (){
           switch ($this->status){
               case BookStatus::Available:
                   return 'green';
               case BookStatus::Taken:
                   return 'yellow';
               case BookStatus::Other:
                   return 'gray';
           }
        });
    }


}
