<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcat
 * @package App\Models
 * @property int id
 * @property string name
 * @property int cat_id
 */
class Subcat extends Model
{
    public function cat()
    {
        return $this->belongsTo(Subcat::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
