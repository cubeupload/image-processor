<?php

    use CubeUpload\ImageProcessor\ImageProcessor;
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
        
        public function testPngHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->png64x48 );
            
            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\PngImageHandler::class, $p->getHandler());
        }

        public function testBmpHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->bmp64x48 );

            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\BmpImageHandler::class, $p->getHandler());
        }

        public function testGifHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->gif64x48 );

            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\GifImageHandler::class, $p->getHandler());
        }

        public function testJpgHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->jpg64x48 );

            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\JpgImageHandler::class, $p->getHandler());
        }

        public function testPdfHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->pdf64x48 );

            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\PdfImageHandler::class, $p->getHandler());
        }

        public function testTifHandlerSelection()
        {
            $p = new ImageProcessor();
            $p->load( $this->tif64x48 );

            $this->assertInstanceOf( CubeUpload\ImageProcessor\Handlers\TifImageHandler::class, $p->getHandler());
        }

        public function testValid()
        {
            $p = new ImageProcessor;
            $p->load( $this->png64x48 );

            $this->assertTrue( $p->isValid() );
        }

        public function testJpgProcessing()
        {
            $p = new ImageProcessor;
            $p->load( $this->jpg64x48 );

            if( $p->isValid() )
                $p->process();
        }
        
        public function testLoadingFromConstruct()
        {
            $p = new ImageProcessor( $this->png64x48 );
            
            $this->assertTrue( $p->isValid() );
        }
    }