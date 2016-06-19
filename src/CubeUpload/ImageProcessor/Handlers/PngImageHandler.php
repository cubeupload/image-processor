<?php namespace CubeUpload\ImageProcessor\Handlers;

class PngImageHandler extends ImageHandler implements IImageHandler
{
    private $headerSize = 16;
    private $magicByte = "89504e470d0a1a0a0000000d49484452";
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ) );
    }
    
    public function valid()
    {
        return $this->getMagicBytes() === $this->magicByte;
    }
}