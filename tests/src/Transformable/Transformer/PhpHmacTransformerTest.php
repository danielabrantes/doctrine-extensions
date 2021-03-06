<?php

namespace MediaMonks\Doctrine\Transformable\Transformer;

class PhpHmacTransformerTest extends \PHPUnit_Framework_TestCase
{
    const ALGORITHM = 'sha256';
    const KEY = '7922GS0S3LoF2T5anKX4zAx4ED3463dyXFK7s1bp';
    const BINARY = false;
    const VALUE = 'foobar';

    /**
     * @var TransformerInterface
     */
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new PhpHmacTransformer(self::KEY, [
            'algorithm' => self::ALGORITHM,
            'binary'    => self::BINARY
        ]);
    }

    public function testTransform()
    {
        $this->assertEquals(
            \hash_hmac(self::ALGORITHM, self::VALUE, self::KEY,self::BINARY),
            $this->transformer->transform(self::VALUE)
        );
    }

    public function testReverseTransform()
    {
        $this->assertEquals(self::VALUE, $this->transformer->reverseTransform(self::VALUE));
    }
}
