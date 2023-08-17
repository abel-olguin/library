<?php

namespace App\Enums;

enum BookStatus: string
{
    case Taken = "taken";
    case Available = "available";
    case Other = 'other';
}
