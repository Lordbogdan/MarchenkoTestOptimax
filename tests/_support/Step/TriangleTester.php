<?php

declare(strict_types=1);

namespace Step;

use ApiTester;

class TriangleTester extends ApiTester
{
    public const URL = '/triangle';

    public function isPossible(array $params): void
    {
        $this->sendGet(self::URL . '/possible', $params);
    }
}
