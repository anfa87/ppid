<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Information extends Model
{
    use HasFactory, Sluggable;


    protected $guarded = ['id'];


    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function files()
    {
        return $this->hasMany(File::class,'information_id','id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
