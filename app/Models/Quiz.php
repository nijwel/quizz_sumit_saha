<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    /**
     * Get the options for the question.
     */
    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
