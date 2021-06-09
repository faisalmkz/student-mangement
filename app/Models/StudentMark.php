<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    /**
     * Get the user that owns the StudentMark
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function term(){
        return $this->belongsTo(Term::class, 'term_id');
    }

    protected $fillable = [
        'student_id',
        'term_id',
        'maths',
        'science',
        'history',
    ];
}
