<?php

    use CubeUpload\ImageProcessor;
    use PHPUnit\Framework\TestCase;
    
    class ImageProcessorTest extends TestCase
    {        
        use \TestVarsTrait;

        public function testImageProcessorClassExists()
        {
            $p = new ImageProcessor();
        }
        
        public function testSplFileInfoClass()
        {
            $p = new ImageProcessor();
            $p->load( $this->png64x48 );
            
            $this->assertInstanceOf( \SplFileInfo::class, $p->getSplFileInfo() );
        }
        
        public function testFileLoading()
        {
            $p = new ImageProcessor();
            $p->load( $this->png64x48 );
            
            $this->assertEquals( "image_64x48.png", $p->getFilename() );
        }
        
        public function testHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->png64x48 );
            
            $this->assertInstanceOf( CubeUpload\Handlers\PngImageHandler::class, $p->getHandler());
        }
    }