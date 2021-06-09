<?php

namespace App\Models;

use App\models\Standard;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /**
     * Get the user that owns the Students
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportingTo()
    {
        return $this->belongsTo(User::class, 'reporting_to');
    }
    public function standard()
    {
        return $this->belongsTo(Standard::class, 'standard_id');
    }

    protected $fillable = [
        'name',
        'age',
        'gender',
        'standard_id',
        'reporting_to',
        'created_at'
    ];
}
