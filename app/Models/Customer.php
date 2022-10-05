<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email'
    ];
    /**
     * Relation customer has many answers
     *
     * @return Answer
     */
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function scopeEmail($query, $email) {
        return $query->where('email',$email);
    }
}
