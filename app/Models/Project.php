<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'project_link',
        'collaborators',
        'frameworks',
        'prog_languages',
        'date_started',
        'date_ended',
    ];

    public static function generateSlug($str){
        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exist = Project::where('slug',$slug)->first();
        $c = 1;
        while($slug_exist){
            $slug = $original_slug . '-' . $c;
            $slug_exist = Project::where('slug',$slug)->first();
            $c++;

        };

        return $slug;
    }
}
