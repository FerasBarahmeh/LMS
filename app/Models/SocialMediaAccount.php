<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'link',
        'icon_id',
    ];

    public function icon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

}
