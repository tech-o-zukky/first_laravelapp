<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson; // 6-17

class Person extends Model
{
    use HasFactory;

    // 6-18
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')'; 
    }

    // 6-11
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    // 6-13
    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age','>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age','<=', $n);
    }

    // 6-17
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }    

    /*
    // 6-15
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('age', '>', 50);
        });
    }
    */

    // 6-35
    // public function board()
    // {
    //     return $this->hasOne('App\Models\Board');
    // }

    // 6-37
    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }

}