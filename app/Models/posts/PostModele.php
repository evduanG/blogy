<?php

namespace App\Models\posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModele extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = [
        "id",
        "title",
        "image",
        "description",
        "category",
        "user_id",
        "user_name",
        "created_at"
    ];
    public $timestamps = false;
}
