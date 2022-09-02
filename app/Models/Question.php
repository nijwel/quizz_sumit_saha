<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * Get the options for the question.
     */
    public function option()
    {
        return $this->hasOne(Option::class);
    }
}
