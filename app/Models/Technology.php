<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public static function getSlug($name)
    {
        $slug = Str::of($name)->slug('-');
        $count = 1;

        while (Technology::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}

