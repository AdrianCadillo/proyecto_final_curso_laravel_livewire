<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory,HasUuids,SoftDeletes;
    
    protected $primaryKey = "id_curso";

    protected $guarded = ["id_curso","deleted_at","updated_at","updated_at"];
}
