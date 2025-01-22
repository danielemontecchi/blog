<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	/** @use HasFactory<\Database\Factories\UserFactory> */
	use HasFactory, Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password',
	];
	protected $hidden = [
		'password',
		'remember_token',
	];

	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password'          => 'hashed',
		];
	}

	/*** Relationships ***/

	/**
	 * @return BelongsToMany<BlogPost, User>
	 */
	public function categories(): BelongsToMany
	{
		/** @var BelongsToMany<BlogPost, User> */
		return $this->belongsToMany(BlogPost::class);
	}
}
