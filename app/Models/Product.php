<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model implements \JsonSerializable
{
    use HasFactory;

    public $connection = 'mysql';

    public $fillable = [
        'name',
        'category',
        'identity',
        'why',
    ];

    public function warehouseProduct(): HasOne
    {
        return $this->hasOne(WarehouseProduct::class, 'identity', 'identity');
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'category' => $this->category,
            'identity' => $this->identity,
            'url' => $this->getUrl(),
            'warehouseProduct' => $this->warehouseProduct,
        ];
    }

    public static function classFillable(): array
    {
        return (new self)->fillable;
    }

    public function getUrl(): string
    {
        return route('product.show', $this);
    }
}
