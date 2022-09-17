<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer',
        'question_id',
        'customer_id',
        'single_link'
    ];

    /**
     * Undocumented function
     * Relation answer belongs to question
     * @return void
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Relation answer belongs to customer
     *
     * @return Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeHashPath($query, $single_link) {

        return $query->where('single_link',$single_link);
    }
}
