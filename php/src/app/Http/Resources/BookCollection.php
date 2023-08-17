<?php

namespace App\Http\Resources;

use App\Traits\HasApiResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    use HasApiResponse;
    public static $wrap = 'books';

}
