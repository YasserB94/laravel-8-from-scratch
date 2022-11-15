<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];//Do not allow this value to be updated from the App
    protected $with = ['category', 'author'];//Always Come with these relationships(Prevent too many Database requests)

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function (Builder $query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });
//        if($filters['search'] ?? false)
//        $query->where('title','like','%'.request('search').'%')
//            ->orWhere('body','like','%'.request('search').'%');
        $query->when($filters['category'] ?? false, function (Builder $query, $category) {
            //Pick any post that has a category
            $query->whereHas('category', fn(Builder $query) => //Select the one where the slug is equal to the category given in the GET uri
            $query->where('slug', $category)
            );
        });
        $query->when($filters['author'] ?? false, function (Builder $query, $authorUsername) {
            $query->whereHas('author', fn(Builder $query) =>
            $query->where('username', $authorUsername)
            );
        });
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
