<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitsu extends Model
{
    use HasFactory;

    public $timestamps = [];
    protected $guarded = [];
}
