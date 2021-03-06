<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'isOrganizer'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * A user may creaet many events (as an Organizer)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  	public function ownedEvents() {
		return $this->hasMany('App\Event');
	}

    /**
     * A user may subscribe to many events (as a Participant)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribedEvents() {
        return $this->hasMany('App\Event');
    }
}
