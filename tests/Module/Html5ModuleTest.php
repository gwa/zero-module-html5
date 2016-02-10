<?php
namespace Gwa\Wordpress\Zero\Module\Tests;

use Gwa\Wordpress\Zero\Module\Html5Module;
use Gwa\Wordpress\WpBridge\MockeryWpBridge;
use Gwa\Wordpress\Zero\Theme\HookManager;

class Html5ModuleTest extends \PHPUnit_Framework_TestCase
{
    private $bridge;
    private $hookmanager;
    private $instance;

    public function setUp()
    {
        $this->bridge      = new MockeryWpBridge;
        $this->hookmanager = new HookManager;
        $this->hookmanager->setWpBridge($this->bridge);

        $this->instance = new Html5Module;
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('Gwa\Wordpress\Zero\Module\AbstractThemeModule', $this->instance);
    }

    public function testInit()
    {
        $this->instance->init($this->bridge, $this->hookmanager);
    }

    public function testWrapImgInFigure()
    {
        $actual = $this->instance->wrapImgInFigure('aa<img src="http://gteub.local/app/uploads/2015/12/12033142_966406760064780_442362630020242130_n.jpg" title="" alt="12033142_966406760064780_442362630020242130_n" class="image-embed alignright">asd');

        $expected = 'aa<figure class="image-embed alignright"><img src="http://gteub.local/app/uploads/2015/12/12033142_966406760064780_442362630020242130_n.jpg" title="" alt="12033142_966406760064780_442362630020242130_n" class="image-embed alignright"></figure>asd';

        $this->assertEquals($expected, $actual);

        $actual = $this->instance->wrapImgInFigure('<a href="#"><img src="http://gteub.local/app/uploads/2015/12/12033142_966406760064780_442362630020242130_n.jpg" title="" alt="12033142_966406760064780_442362630020242130_n" class="image-embed alignright"></a>');

        $expected = '<figure class="image-embed alignright"><a href="#"><img src="http://gteub.local/app/uploads/2015/12/12033142_966406760064780_442362630020242130_n.jpg" title="" alt="12033142_966406760064780_442362630020242130_n" class="image-embed alignright"></a></figure>';

        $this->assertEquals($expected, $actual);
    }
}
