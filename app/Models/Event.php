<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'events';

    protected $fillable = [
        'name',
        'address',
        'coordinates',
        'full_description',
        'short_description',
        'max_people_count',
        'start_at',
        'finish_at',
        'author_id',
        'private',
        'age_from',
        'age_to',
        'price',
        'insta_link',
        'site_link',
        'vk_link',
        'rating',
        'active',
    ];
    public $timestamp = false;
}
