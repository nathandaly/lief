<?php

declare(strict_types=1);

namespace App\Concerns;

use Hidehalo\Nanoid\Client;

trait HasNanoId
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootHasNanoId(): void
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getNanoIdColumn()})) {
                $model->{$model->getNanoIdColumn()} = self::generateNanoId();
            }
        });
    }

    /**
     * Get the name of the "NanoId" column.
     *
     * @return string
     */
    protected function getNanoIdColumn(): string
    {
        return 'nanoid';
    }

    /**
     * Generate a new NanoId.
     *
     * @return string
     */
    protected static function generateNanoId(): string
    {
        $client = new Client();
        return $client->generateId();
    }
}
