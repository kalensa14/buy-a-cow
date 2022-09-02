<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAction extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at', 'updated_at', 'id'
    ];

    protected $casts = [
        'action' => \App\Enums\UserAction::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
