<?php

use Blacktrue\Reader\Cfdi;

class CfdiTest extends \PHPUnit\Framework\TestCase
{
    public function  testCreatingInstance()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertInstanceOf(Cfdi::class, $cfdi);
    }

    public function testReadAttributes()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals("28BB36E8-A897-4EB9-A418-138E528352B9", $cfdi->UUID);
        $this->assertEquals("1000.00", $cfdi->subTotal);
        $this->assertEquals("1160.00", $cfdi->total);
    }

    public function testReadConcepts()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals(10, count($cfdi->getConceptos()));
    }

    public function testReadTotalImpuestosTrasladados()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals("160.00", $cfdi->getTotalImpuestosTrasladados());
    }

    public function testReadReceptorAttribute()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals("SOHM7509289MA", $cfdi->getReceptor('rfc'));
    }

    public function testReadEmisorAttribute()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals("AAA010101AAA", $cfdi->getEmisor('rfc'));
    }


    public function testExceptionInMethodNotExists()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->expectException(\Blacktrue\Exceptions\CfdiReaderException::class);

        $cfdi->asfasafdsa();
    }

    public function testAttributeNotExists()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertNull($cfdi->adasd);
    }

    public function testToStringObject()
    {
        $cfdi = new Cfdi();
        $cfdi->setXml(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'));

        $this->assertEquals(file_get_contents(realpath(dirname(__FILE__)).'/files/cfdi.xml'), $cfdi->__toString());
    }
}