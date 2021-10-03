<?php

declare(strict_types=1);

namespace Api;

use Codeception\Example;
use Step\TriangleTester;

class PossibleTriangleCest
{
    /**
     * @param TriangleTester $I
     * @param Example $provider
     *
     * @dataProvider triangleDataProvider
     */
    public function isPossible(TriangleTester $I, Example $provider): void
    {
        $I->isPossible($provider['params']);
        $I->seeResponseContainsJson($provider['expectedArray']);
    }

    protected function triangleDataProvider(): array
    {
        return [

            ['params' => [], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['b' => 1], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['c' => 1], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'b' => 2], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'c' => 1], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['b' => 1, 'c' => 1], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 'hello', 'b' => 1, 'c' => 10], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'b' => 'hello', 'c' => 10], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'b' => 2, 'c' => 'hello'], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => -1, 'b' => 2, 'c' => 3], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'b' => -2, 'c' => 3], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
            ['params' => ['a' => 1, 'b' => 2, 'c' => -3], 'expectedArray' => ['message' => ['error' => 'Not valid date']]],
        ];
    }

    /**
     * @param TriangleTester $I
     * @param Example $provider
     *
     * @dataProvider naturalNumDataProvider
     */
    public function isPossibleNaturalNum(TriangleTester $I, Example $provider): void
    {
        $I->isPossible($provider['params']);
        $I->seeResponseContainsJson($provider['expectedArray']);
    }
    protected function naturalNumDataProvider(): array
    {
        return [
            ['params' => ['a' => 0, 'b' => 2, 'c' => 3], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 1, 'b' => 0, 'c' => 3], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 1, 'b' => 2, 'c' => 0], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 1, 'b' => 2, 'c' => 3], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 1, 'b' => 3, 'c' => 2], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 2, 'b' => 1, 'c' => 3], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 2, 'b' => 3, 'c' => 1], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 3, 'b' => 1, 'c' => 2], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 3, 'b' => 2, 'c' => 1], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 1, 'b' => 1, 'c' => 1], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 10, 'b' => 2, 'c' => 1], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 2, 'b' => 10, 'c' => 1], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 2, 'b' => 1, 'c' => 10], 'expectedArray' => ['isPossible' => false]],
            ['params' => ['a' => 10, 'b' => 9, 'c' => 9], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 9, 'b' => 10, 'c' => 9], 'expectedArray' => ['isPossible' => true]],
            ['params' => ['a' => 9, 'b' => 9, 'c' => 10], 'expectedArray' => ['isPossible' => true]],
        ];
    }
}
