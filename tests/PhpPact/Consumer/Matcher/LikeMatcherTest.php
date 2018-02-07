<?php

namespace PhpPact\Consumer\Matcher;

use PHPUnit\Framework\TestCase;

class LikeMatcherTest extends TestCase
{
    public function testMatcherWithSingleArray()
    {
        $matcher = new LikeMatcher(['name' => 'Games']);
        $json    = \json_encode($matcher);
        $this->assertEquals('{"contents":{"name":"Games"},"json_class":"Pact::ArrayLike","min":1}', $json);
    }

    public function testMatcherWithSingleValue()
    {
        $matcher = new LikeMatcher('Games');
        $json    = \json_encode($matcher);
        $this->assertEquals('{"contents":"Games","json_class":"Pact::SomethingLike"}', $json);
    }

    public function testMatcherWithMultipleValuesInArray()
    {
        $matcher = new LikeMatcher(['name' => 'Games', 'type' => 'Baseball']);
        $json    = \json_encode($matcher);
        $this->assertEquals('{"contents":{"name":"Games","type":"Baseball"},"json_class":"Pact::ArrayLike","min":1}', $json);
    }

    public function testMatcherWithMin()
    {
        $matcher = new LikeMatcher(['name' => 'Games'], 5);
        $json    = \json_encode($matcher);
        $this->assertEquals('{"contents":{"name":"Games"},"json_class":"Pact::ArrayLike","min":5}', $json);
    }

    public function testMatcherWithMax()
    {
        $matcher = new LikeMatcher(['name' => 'Games'], null, 10);
        $json    = \json_encode($matcher);
        $this->assertEquals('{"contents":{"name":"Games"},"json_class":"Pact::ArrayLike","min":1,"max":10}', $json);
    }
}
