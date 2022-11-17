<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];//Do not allow this value to be updated from the App
    protected $with = ['category', 'author'];//Always Come with these relationships(Prevent too many Database requests)

    //When a Post is created -> Boot
    protected static function boot()
    {
        //Run Boot in the Parent (Model class)
        parent::boot();
        //Register a callback function to run upon creation
        static::creating(
            //Callback function takes the post being created
            function ($post) {
                //Produce the slug based on the title
                //Using Laravel Str::slug Helper function
                $slug = Str::slug($post->title);
                //Check if the slug exists in the database
                //If so, save the amount of identical slugs to $count
                $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                //Set the slug to the slug+count if it already exists
                $post->slug = $count ? "{$slug}-{$count}" : $slug;
            });
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        //NOTE:: use -> Function passing
        $query->when(
            $filters['search'] ?? false,
            function (Builder $query, $search) {
                $query->where(
                    function (Builder $query) use ($search) {
                        $query
                            ->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
                    });
            });
        $query->when($filters['category'] ?? false, function (Builder $query, $category) {
            //Pick any post that has a category
            $query->whereHas('category', fn(Builder $query) => //Select the one where the slug is equal to the category given in the GET uri
            $query->where('slug', $category)
            );
        });
        $query->when($filters['author'] ?? false, function (Builder $query, $authorUsername) {
            $query->whereHas('author', fn(Builder $query) => $query->where('username', $authorUsername));
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
