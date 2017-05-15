<?php

namespace Foobooks;

use Illuminate\Database\Eloquent\Model;
use Foobooks\User;

class Book extends Model
{
    public function author() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Foobooks\User');
    }


    public function tags()
	{
	    # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
	    return $this->belongsToMany('\Foobooks\Tag')->withTimestamps();
	}
}

