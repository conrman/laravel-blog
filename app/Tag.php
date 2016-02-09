<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $fillable = [
		'name',
	];

	/**
	 * Get posts associated with the given tag
	 * 
	 * @return  Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function posts()
	{
		return $this->belongsToMany('Blog\Post')->withTimestamps();
	}
}
