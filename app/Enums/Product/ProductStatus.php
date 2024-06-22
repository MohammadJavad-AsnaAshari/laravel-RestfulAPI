<?php

namespace App\Enums\Product;

enum ProductStatus: string
{
    case AVAILABLE_PRODUCT = 'available';
    case UNAVAILABLE_PRODUCT = 'unavailable';
}
