<?php namespace CubeUpload\Handlers;

class PdfImageHandler extends ImageHandler implements IImageHandler
{
    private $headerSize = 4;
    private $magicByte = "25504446";
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ) );
    }
    
    public function valid()
    {
        return $this->getMagicBytes() === $this->magicByte;
    }
}