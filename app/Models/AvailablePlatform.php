<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class AvailablePlatform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'TLD',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'social_media_account', 'available_platform_id', 'user_id')
            ->withTimestamps()
            ->withPivot('username')
            ->as('mediaAccounts');
    }

    public function user($id=null): BelongsToMany
    {
        $id = $id ?? Auth::id();
        return $this->users()->where('user_id', $id);
    }
}
