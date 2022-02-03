<?php

declare(strict_types=1);

namespace Application\Interfaces;

interface Covid19Api
{
    public function getLastSixMonthsCase();
}
