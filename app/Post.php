<?php

namespace Blog;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
    'build_from' => 'title',
    'save_to' => 'slug',
    ];

    /**
     * Fillable fields for mass assignment.
     * 
     * @var
     */
    protected $fillable = [
    'title',
    'body',
    'published_at',
    ];

    /**
     * Make 'published_at' attribute a date object.
     * 
     * @var
     */
    protected $date = ['published_at'];

    /**
     * Set 'published_at' date format.
     * 
     * @param Carbon $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get 'published_at' attribute.
     *
     * @author    Connor Freeman
     *
     * @param Carbon $date
     *
     * @return type
     */
    public function getPublishedAtattribute($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Show published.
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Show unpublished.
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>=', Carbon::now());
    }

    /**
     * Post is owned by a user.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Blog\User');
    }

    /**
     * Post has many tags.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('Blog\Tag');
    }

    /**
     * Get a list of tags id's associated with current article.
     * 
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }
}
