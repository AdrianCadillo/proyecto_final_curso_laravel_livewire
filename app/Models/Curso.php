<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey = "id_curso";

    protected $guarded = ["id_curso","deleted_at","updated_at","updated_at"];
}
