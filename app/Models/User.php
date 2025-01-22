<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
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

	/*** Boot ***/

	public function canAccessPanel(Panel $panel): bool
	{
		return str_ends_with($this->email, '@montecchi.me') && $this->hasVerifiedEmail();
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
