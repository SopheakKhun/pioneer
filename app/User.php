<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $suburb
 * @property string $state
 * @property integer $postcode
 * @property integer $phone
 * @property integer $mobile
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'address', 'suburb', 'state', 'postcode', 'phone', 'mobile', 'remember_token'];
    protected $hidden = ['password', 'remember_token'];
    public static $searchable = [
    ];
    
    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPostcodeAttribute($input)
    {
        $this->attributes['postcode'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPhoneAttribute($input)
    {
        $this->attributes['phone'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMobileAttribute($input)
    {
        $this->attributes['mobile'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
