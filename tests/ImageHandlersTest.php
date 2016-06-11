<?php
    
    use PHPUnit\Framework\TestCase;
    
    use CubeUpload\ImageProcessor;
    
    class ImageHandlersTest extends TestCase
    {        
        use \TestVarsTrait;
        
        protected $handlers = [
            'jpg' => CubeUpload\Handlers\JpgImageHandler::class,
            'png' => CubeUpload\Handlers\PngImageHandler::class,
            'gif' => CubeUpload\Handlers\GifImageHandler::class,
            'bmp' => CubeUpload\Handlers\BmpImageHandler::class,
            'tif' => CubeUpload\Handlers\TifImageHandler::class,
            'pdf' => CubeUpload\Handlers\PdfImageHandler::class
        ];    
        
        public function testJpgValidation()
        {
            $h = new $this->handlers['jpg'];
            $h->open( $this->jpg64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testPngValidation()
        {
            $h = new $this->handlers['png'];
            $h->open( $this->png64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testGifValidation()
        {
            $h = new $this->handlers['gif'];
            $h->open( $this->gif64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testTifValidation()
        {
            $h = new $this->handlers['tif'];
            $h->open( $this->tif64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testBmpValidation()
        {
            $h = new $this->handlers['bmp'];
            $h->open( $this->bmp64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testPdfValidation()
        {
            $h = new $this->handlers['pdf'];
            $h->open( $this->pdf64x48 );
            $this->assertTrue( $h->valid() );
        }
        
        public function testInvalidFile()
        {
            $h = new $this->handlers['png'];
            $h->open( $this->bmp64x48 );
            $this->assertFalse( $h->valid() );
        }
    }