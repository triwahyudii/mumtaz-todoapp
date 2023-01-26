<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable  = [
        'fullname', 
        'description'
    ];

    public function member(){
        return $this->belongsToMany(Member::class, 'fullname', 'id');
    }

    public function description(){
        return $this->hasManyThrough(Member::class, Member::class, 'id');
    }

    public function members(){
        return [
            'id' => Member::factory(),
            'fullname_id' => function (array $attributes) {
                return Member::find($attributes['id'])->fullname;
            }      
        ];
    }
}
