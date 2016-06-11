<?php namespace CubeUpload\Handlers;

class GifImageHandler extends ImageHandler implements IImageHandler
{
    private $headerSize = 6;
    private $magicByteArray = [ "474946383961", "474946383761" ];
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ) );
    }
    
    public function valid()
    {     
        return in_array( $this->getMagicBytes(), $this->magicByteArray);
    }
}