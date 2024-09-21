<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    // fungsi yang bertujuan untuk memberitahu model apa saja yang bisa diisi
    protected $fillable = ['title', 'slug', 'author', 'body'];
    use HasFactory;


    // Relasi antara table Post dengan User
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // default eager loading
    protected $with = ['author', 'category'];


    // Untuk melakukan search yang menyambung ke dalam roter web.php /posts
    public function scopeFilter(Builder $query, array $filter): void
    {
        // if (isset($filter['search']) ? $filter['search'] : false) {
        // $query->where('title', 'like', '%' . request('search') . '%');
        // }

        $query->when(
            $filter['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        // category dan author diambil dari method yang ada di model Post
        $query->when(
            $filter['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filter['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }
}
