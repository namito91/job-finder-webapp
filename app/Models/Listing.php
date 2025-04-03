<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    
    public function scopeFilter($query, array $filters)
    {

        // filtra los items por tag
        if ($filters['tag'] ?? false) {

            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // filtra los items por palabras clave
        if ($filters['search'] ?? false) {

            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
