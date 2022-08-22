<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $text
 * @property string|null $sound
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class Advice extends Model
{
    use HasTranslations;

    public array $translatable = [
        'text',
    ];

    protected $table = 'advices';

    protected $fillable = [
        'id',
        'text',
        'sound',
    ];
}
