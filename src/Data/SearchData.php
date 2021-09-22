<?php

namespace App\Data;

use App\Entity\Chambre;


class SearchData
{
    /**
     * @var string
     */
    public string $q = '';

    /**
     * @var Chambre[]
     */
    public array $hotel = [];
    /**
     * @var null|integer
     */
    public ?int $max;
    /**
     * @var null|integer
     */
    public ?int $min;

    /**
     * @var boolean
     */
    public bool $promo = false;
    /**
     * @var string|null
     */
    public string $image;
}