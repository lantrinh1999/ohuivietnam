<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
    ];

    public function getParentCategory()
    {
        return self::where('id', '=', $this->parent_id)->first();
    }

    public function getChildCategory()
    {
        return self::where('parent_id', '=', $this->id)->get();
    }

    public function getParents()
    {
        return self::where('parent_id', '=', 0)->get();

    }

    public function getChild()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function scopeGetAll($query)
    {
        return $query->where('parent_id', '=', 0);
    }

}
