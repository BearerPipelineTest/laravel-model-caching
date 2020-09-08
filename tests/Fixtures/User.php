<?php namespace GeneaLabs\LaravelModelCaching\Tests\Fixtures;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Cachable;

    protected $fillable = [
        "name",
        "supplier_id",
    ];

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, "imagable");
    }
}
