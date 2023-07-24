<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model implements \JsonSerializable
{
    use HasFactory;

    public $connection = 'pgsql';

    public $fillable = [
        'name'
    ];

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'identity' => $this->identity,
            'url' => route('warehouse-product.show', $this),
        ];
    }

    public static function classFillable(): array
    {
        return (new self)->fillable;
    }
}
