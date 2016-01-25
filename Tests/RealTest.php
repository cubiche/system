<?php

/*
 * This file is part of the Cubiche package.
 *
 * Copyright (c) Cubiche
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cubiche\Domain\System\Tests;

use Cubiche\Domain\System\Real;

/**
 * Real Test.
 *
 * @author Karel Osorio Ramírez <osorioramirez@gmail.com>
 */
class RealTest extends RealTestCase
{
    /**
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct(Real::class, $name, $data, $dataName);
    }

    /**
     * @test
     */
    public function add()
    {
        parent::add();

        $result = $this->number()->addReal($this->secondValue());
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals($this->firstNativeValue() + $this->secondNativeValue(), $result->toNative());
        $this->assertTrue($this->number()->addInteger($this->integerValue())->equals(
            $this->number()->addReal($this->integerValue()->toReal())
        ));
        $this->assertTrue($this->number()->addDecimal($this->decimalValue())->equals(
            $this->number()->toDecimal()->addDecimal($this->decimalValue())
        ));
        $this->assertTrue($this->number()->addDecimal($this->decimalValue(), 2)->equals(
            $this->number()->toDecimal()->addDecimal($this->decimalValue(), 2)
        ));
    }

    /**
     * @test
     */
    public function sub()
    {
        parent::sub();

        $result = $this->number()->subReal($this->secondValue());
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals($this->firstNativeValue() - $this->secondNativeValue(), $result->toNative());
        $this->assertTrue($this->number()->subInteger($this->integerValue())->equals(
            $this->number()->subReal($this->integerValue()->toReal())
        ));
        $this->assertTrue($this->number()->subDecimal($this->decimalValue())->equals(
            $this->number()->toDecimal()->subDecimal($this->decimalValue())
        ));
        $this->assertTrue($this->number()->subDecimal($this->decimalValue(), 2)->equals(
            $this->number()->toDecimal()->subDecimal($this->decimalValue(), 2)
        ));
    }

    /**
     * @test
     */
    public function mult()
    {
        parent::mult();

        $result = $this->number()->multReal($this->secondValue());
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals($this->firstNativeValue() * $this->secondNativeValue(), $result->toNative());
        $this->assertTrue($this->number()->multInteger($this->integerValue())->equals(
            $this->number()->multReal($this->integerValue()->toReal())
        ));
        $this->assertTrue($this->number()->multDecimal($this->decimalValue())->equals(
            $this->number()->toDecimal()->multDecimal($this->decimalValue())
        ));
        $this->assertTrue($this->number()->multDecimal($this->decimalValue(), 2)->equals(
            $this->number()->toDecimal()->multDecimal($this->decimalValue(), 2)
        ));
    }

    /**
     * @test
     */
    public function div()
    {
        parent::div();

        $result = $this->number()->divReal($this->secondValue());
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals($this->firstNativeValue() / $this->secondNativeValue(), $result->toNative());
        $this->assertTrue($this->number()->divInteger($this->integerValue())->equals(
            $this->number()->divReal($this->integerValue()->toReal())
        ));
        $this->assertTrue($this->number()->divDecimal($this->decimalValue())->equals(
            $this->number()->toDecimal()->divDecimal($this->decimalValue())
        ));
        $this->assertTrue($this->number()->divDecimal($this->decimalValue(), 2)->equals(
            $this->number()->toDecimal()->divDecimal($this->decimalValue(), 2)
        ));
    }

    /**
     * @test
     */
    public function pow()
    {
        parent::pow();

        $result = $this->number()->powReal($this->secondValue());
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals(\pow($this->firstNativeValue(), $this->secondNativeValue()), $result->toNative());
        $this->assertTrue($this->number()->powInteger($this->integerValue())->equals(
            $this->number()->powReal($this->integerValue()->toReal())
        ));
        $this->assertTrue($this->number()->powDecimal($this->decimalValue())->equals(
            $this->number()->toDecimal()->powDecimal($this->decimalValue())
        ));
        $this->assertTrue($this->number()->powDecimal($this->decimalValue(), 2)->equals(
            $this->number()->toDecimal()->powDecimal($this->decimalValue(), 2)
        ));
    }

    /**
     * @test
     */
    public function sqrt()
    {
        $result = $this->number()->sqrt();
        $this->assertInstanceOf(Real::class, $result);
        $this->assertEquals(\sqrt($this->firstNativeValue()), $result->toNative());

        $result = $this->number()->sqrt(2);
        $this->assertEquals(\bcsqrt($this->firstNativeValue(), 2), $result->toNative());
    }
}
