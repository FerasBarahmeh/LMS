<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LectureAttachment extends Model
{
    public function lecture(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }
}
