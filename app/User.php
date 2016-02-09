<?php

namespace Blog;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User can have many posts.
     *
     * @author Connor Freeman
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Blog\Post');
    }

    /**
     * Query the name attribute for the user.
     *
     * @author Connor Freeman
     * 
     * @param $query
     */
    public function scopeName($query)
    {
        $query->where('name', $this->name);
    }

    /**
     * Get a list of post ids associated with the user.
     *
     * @author Connor Freeman
     *
     * @return array
     */
    public function getPostListAttribute()
    {
        return $this->posts->lists('id')->all();
    }
}
