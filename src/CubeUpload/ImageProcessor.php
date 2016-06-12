<?php namespace CubeUpload;

    use \SplFileInfo;

    class ImageProcessor
    {
        private $fileInfo;
        private $handler;

        public function load($path)
        {
            if( file_exists( $path ) )
            {
                $this->fileInfo = new SplFileInfo($path);
                $this->loadHandler();
            }
            else
                throw new \Exception( "File doesn't exist" );
        }
        
        private function loadHandler()
        {
            $extn = strtolower( $this->fileInfo->getExtension() );
            $class = "";

            switch( $extn )
            {
                case "jpg":
                case "jpeg":
                    $class = 'CubeUpload\Handlers\JpgImagehandler';
                break;

                case 'png':
                    $class = 'CubeUpload\Handlers\PngImageHandler';
                break;

                case 'bmp':
                    $class = 'CubeUpload\Handlers\BmpImageHandler';
                break;

                case 'gif':
                    $class = 'CubeUpload\Handlers\GifImageHandler';
                break;

                case 'pdf':
                    $class = 'CubeUpload\Handlers\PdfImageHandler';
                break;

                case 'tif':
                    $class = 'CubeUpload\Handlers\TifImageHandler';
                break;

                default:
                    throw new \Exception( "File extension {$extn} not supported");
                break;
            }

            if( class_exists($class))
            {
                $this->handler = new $class();
                $this->handler->open( $this->fileInfo->getPathname() );
            }
            else
                throw new \Exception( "Image handler class " . $class . " not found");
        }
        
        public function getHandler()
        {
            return $this->handler;
        }
        
        public function getFilename()
        {
            return $this->fileInfo->getFilename();
        }
        
        public function getSplFileInfo()
        {
            return $this->fileInfo;
        }
        
        public function getMagicBytes()
        {
            return $this->handler->getMagicBytes();
        }
    }