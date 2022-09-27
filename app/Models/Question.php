<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'type',
        'possible_answer',
        'survey_id'
    ];

    /**
     * Relation question has many answers
     *
     * @return Answer
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Relation question belgons to Survey
     *
     * @return Survey
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function scopeAnswerPossible($query, $id) {
        return $query->where('id', $id);
    }
}
