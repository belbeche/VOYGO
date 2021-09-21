<?php

namespace App\Data;

use App\Entity\Chambre;

class searchData
{
    /**
     * @var string
     */
    public string $q = '';

    /**
     * @var Chambre[]
     */
    public array $chambres = [];
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
}