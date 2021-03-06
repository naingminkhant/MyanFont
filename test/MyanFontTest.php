<?php

namespace test;

use Tintnaingwin\MyanFont\MyanFont;

class MyanFontTest extends \PHPUnit\Framework\TestCase
{
    use DataTestHelper;

    const
        ZAWGYI = 'ZawGyi',
        UNICODE = 'Unicode',
        MYANMAR = 'Myanmar';

    public function test_check_font()
    {
        $font = MyanFont::checkFont($this->zawgyiData());
        $this->assertEquals($font, self::ZAWGYI);

        $font = MyanFont::checkFont($this->unicodeData());
        $this->assertEquals($font, self::UNICODE);
    }

    public function test_convert_zg2uni()
    {
        $convert = MyanFont::zg2uni($this->zawgyiData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::UNICODE);
    }

    public function test_convert_uni2zg()
    {
        $convert = MyanFont::uni2zg($this->unicodeData());
        $font = MyanFont::checkFont($convert);
        $this->assertEquals($font, self::ZAWGYI);
    }
}