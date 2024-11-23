<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;


    protected $with = ['category', 'user', 'photos'];


    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function photos():HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function scopeSearch($query)
    {
        return $query->When(request("keyword"), function ($q) {
            $keyword = request("keyword");
            $q->orWhere("title", "like", "%$keyword%")->orWhere(
                "description",
                "like",
                "%$keyword%"
            );
        });
    }

    public function scopeFilter($query, $filter)
    {
        return $query->when($filter, function ($q, $search) {
            $keyword = $search;
            $q->orWhere("title", "like", "%$keyword%")
                ->orWhere("description", "like", "%$keyword%");
        })->latest()
            ->with(["category", 'user'])
            ->paginate(5)->withQueryString();
    }

    public function scopeAllFilter($query, $filter, $id)
    {
        return $query->where(function ($q) {
            $q->when(request("keyword"), function ($q) {
                $keyword = request("keyword");
                $q->orWhere("title", "like", "%$keyword%")
                    ->orWhere("description", 'like', "%$keyword%");
            });
        })
            ->where('category_id', $id)->latest()
            ->with(['user', 'category'])
            ->paginate(10)->withQueryString();
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strtoupper($value),
        );
    }

    protected function time(): Attribute
    {
        return Attribute::make(
            get: function () {
                return "
                    <p class=' flex items-center gap-1'>
                       <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
                     stroke-width='1.5' stroke='currentColor' class='size-4'>
                    <path stroke-linecap='round' stroke-linejoin='round'
                          d='M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5' />
                                    </svg>
                                    {$this->created_at->format('d M, Y')}
                                </p>
                        <p class=' flex items-center gap-2'>
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
                                         stroke-width='1.5' stroke='currentColor' class='size-4'>
                                        <path stroke-linecap='round' stroke-linejoin='round'
                                              d='M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z' />
                                    </svg>
                                    {$this->created_at->format('h : m A')}
                                </p>";
            }
        );


    }


}
