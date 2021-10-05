<?php

declare(strict_types=1);

namespace Api;

use Codeception\Example;
use Codeception\Util\HttpCode;
use Step\TriangleTester;

class PossibleTriangleCest
{
    /**
     * @param TriangleTester $I
     * @param Example $provider
     *
     * @dataProvider triangleDataProvider
     */


    public function isPossibleGetTriangleData(TriangleTester $I, Example $provider): void
    {
        $I->isPossible($provider['params']);
        $I->seeResponseContainsJson($provider['expectedArray']); //надо тринглтестер переместить сюда, ибо тут не понятно что он делает метод
        $I->seeResponseCodeIs($provider['expectedCode']);
    }
    public function isPossibleShouldFailWhenNotGetMethod(TriangleTester $I): void
    {
        $I->sendPost(TriangleTester::URL . '/possible', ['a' => 10, 'b' => 9, 'c' => 9]);
        $I->seeResponseCodeIs(HttpCode::METHOD_NOT_ALLOWED);
    }

    protected function triangleDataProvider(): array
    {
        return [
            [
                'params' => [
                    'a' => 0,
                    'b' => 2,
                    'c' => 3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' =>
                    [
                        'a' => 1,
                        'b' => 0,
                        'c' => 3
                    ],
                'expectedMessage' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' =>
                    [
                        'a' => 1,
                        'b' => 2,
                        'c' => 0
                    ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' =>
                    [
                        'a' => 1,
                        'b' => 2,
                        'c' => 3
                    ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 3,
                    'c' => 2
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 2,
                    'b' => 1,
                    'c' => 3
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 2,
                    'b' => 3,
                    'c' => 1
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 3,
                    'b' => 1,
                    'c' => 2
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 3,
                    'b' => 2,
                    'c' => 1
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 1,
                    'c' => 1
                ],
                'expectedArray' => [
                    'isPossible' => true
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 10,
                    'b' => 2,
                    'c' => 1
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 2,
                    'b' => 10,
                    'c' => 1
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 2,
                    'b' => 1,
                    'c' => 10
                ],
                'expectedArray' => [
                    'isPossible' => false
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 10,
                    'b' => 9,
                    'c' => 9
                ],
                'expectedArray' => [
                    'isPossible' => true
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 9,
                    'b' => 10,
                    'c' => 9
                ],
                'expectedArray' => [
                    'isPossible' => true
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [
                    'a' => 9,
                    'b' => 9,
                    'c' => 10
                ],
                'expectedArray' => [
                    'isPossible' => true
                ],
                'expectedCode' => HttpCode::OK
            ],
            [
                'params' => [],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'b' => 1
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'c' => 1
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 2
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'c' => 1
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'b' => 1,
                    'c' => 1
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 'hello',
                    'b' => 1,
                    'c' => 10
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 'hello',
                    'c' => 10
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 'hello'
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => -1,
                    'b' => 2,
                    'c' => 3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => -2,
                    'c' => 3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => -3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1.1,
                    'b' => 2,
                    'c' => 3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 2.2,
                    'c' => 3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
            [
                'params' => [
                    'a' => 1,
                    'b' => 2,
                    'c' => 3.3
                ],
                'expectedArray' => [
                    'message' => [
                        'error' => 'Not valid data'
                    ]
                ],
                'expectedCode' => HttpCode::BAD_REQUEST
            ],
        ];
    }
}