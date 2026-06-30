<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $fillable = [
		'user_id',
		'profile_image',
		'name',
		'email',
		'address',
		'phone',
		'date_of_birth',
		'notes',
	];

	protected $casts = [
		'date_of_birth' => 'date',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
