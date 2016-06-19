<?php namespace CubeUpload\ImageProcessor\Handlers;

class TifImageHandler extends ImageHandler implements IImageHandler
{
    private $headerSize = 4;
    private $magicByteArray = [ "49492a00", "4d4d002a" ];
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ));
    }
    
    public function valid()
    {
        return in_array( $this->getMagicBytes(), $this->magicByteArray);
    }
}