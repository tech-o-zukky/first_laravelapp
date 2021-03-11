<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

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

}