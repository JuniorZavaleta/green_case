<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Citizen extends Authenticatable
{
    protected $fillable = ['name'];

    /**
     * Relationship with channels Messenger, Telegram and Facebook-Web
     * @return Channel
     */
    public function channels()
    {
        return $this->belongsToMany(
            Channel::class,
            'citizen_communication',
            'citizen_id',
            'communication_type_id'
        );
    }

    /**
     * Relationship with complaints
     * @return Complaint
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class,'id');
    }

    /**
     * Filter from channel where was registered
     * @param  Builder $query   builder before filter
     * @param  int $account_id  account id to filter
     * @param  int $type        channel id
     * @return Builder          builder after filter
     */
    public function scopeFrom($query, $account_id, $type)
    {
        return $query->whereHas('channels', function ($channel) use ($account_id, $type) {
            $channel->where('account_id', $account_id)
                    ->where('communication_type_id', $type);
        });
    }

    /**
     * Filter from Facebook
     * @param  Builder  $query            builder before filter
     * @param  int      $facebook_user_id facebook user id
     * @return Builder                    builder after filter
     */
    public function scopeFromFacebook($query, $facebook_user_id)
    {
        return $query->from($facebook_user_id, Channel::FACEBOOK);
    }

    /**
     * Create a citizen with the facebook user date
     * @param  object $fb_user  facebook user data
     * @return App\Models\Citizen
     */
    public static function createWithFacebook($fb_user)
    {
        $citizen = Citizen::create(['name' => $fb_user->user['first_name']]);

        $citizen->assignChannel($fb_user->id, Channel::FACEBOOK);

        return $citizen;
    }

    /**
     * Assign citizen from the channel it comes
     * @param  int $account_id account id of channel source
     * @param  int $channel    id of channel
     * @return void
     */
    public function assignChannel($account_id, $channel)
    {
        $this->channels()->attach(Channel::find($channel), [
            'account_id' => $account_id
        ]);
    }
}
