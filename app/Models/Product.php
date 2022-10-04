<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Static_;
use PhpParser\Builder;

/**
 * Class Product
 * @package App\Models
 * @property  string $name
 * @method static Builder|Product query()
 * @method static Builder|Product paginate()
 */
class Product extends Model
{

    protected $fillable = ['name', 'description', 'category_id', 'image', 'price', 'active'];
    use HasFactory;

    public function getImageAttribute(): string
    {
        $image = $this->attributes['image'];
        if ($image){
            if (Str::startsWith($image, 'http')) {
                return $image;
            } else {

                return Storage::url($image);
            }
        }
        return 'https://get.wallhere.com/photo/sunlight-landscape-hill-nature-grass-sky-field-clouds-green-morning-farm-horizon-pathway-plateau-cloud-tree-flower-grassland-plant-pasture-agriculture-meadow-plantation-plain-lawn-prairie-crop-rural-area-grass-family-paddy-field-246058.jpg';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
