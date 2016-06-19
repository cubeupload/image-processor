<?php
    
    use PHPUnit\Framework\TestCase;
    
    use CubeUpload\ImageProcessor;
    
    class ImageHandlersTest extends TestCase
    {        
        use \TestVarsTrait;
        
        public function testJpgHandler()
        {
            $h = new ImageProcessor::$handlers['jpg'];
            $h->open( $this->jpg64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertTrue( $h->canProcess() );
        }
        
        public function testPngHandler()
        {
            $h = new ImageProcessor::$handlers['png'];
            $h->open( $this->png64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertFalse( $h->canProcess() );
        }
        
        public function testGifHandler()
        {
            $h = new ImageProcessor::$handlers['gif'];
            $h->open( $this->gif64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertFalse( $h->canProcess() );
        }
        
        public function testTifHandler()
        {
            $h = new ImageProcessor::$handlers['tif'];
            $h->open( $this->tif64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertFalse( $h->canProcess() );
        }
        
        public function testBmpHandler()
        {
            $h = new ImageProcessor::$handlers['bmp'];
            $h->open( $this->bmp64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertFalse( $h->canProcess() );
        }
        
        public function testPdfHandler()
        {
            $h = new ImageProcessor::$handlers['pdf'];
            $h->open( $this->pdf64x48 );
            $this->assertTrue( $h->valid() );
            $this->assertFalse( $h->canProcess() );
        }
        
        public function testInvalidFile()
        {
            $h = new ImageProcessor::$handlers['png'];
            $h->open( $this->bmp64x48 );
            $this->assertFalse( $h->valid() );
        }
    }