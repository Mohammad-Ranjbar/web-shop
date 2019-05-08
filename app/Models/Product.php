<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property string title
 * @property string description
 * @property int price
 * @property int subcat_id
 */
class Product extends Model
{
    public function subcat()
    {
        return $this->belongsTo(Subcat::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
