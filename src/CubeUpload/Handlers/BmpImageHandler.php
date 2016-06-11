<?php namespace CubeUpload\Handlers;

class BmpImageHandler extends ImageHandler implements IImageHandler
{
    private $headerSize = 2;
    private $magicByte = "424d";
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ));
    }
    
    public function valid()
    {
        return $this->getMagicBytes() === $this->magicByte;
    }
}