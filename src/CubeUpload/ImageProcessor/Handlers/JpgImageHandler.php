<?php namespace CubeUpload\ImageProcessor\Handlers;

class JpgImageHandler extends ImageHandler implements IImageHandler
{
    private $header = 'ffd8';
    private $footer = 'ffd9';
    
    public function getMagicBytes()
    {
        return bin2hex( fread( $this->handle, $this->headerSize ));
    }
    
    public function valid()
    {
        $headBytes = fread( $this->handle, 2 );
        fseek( $this->handle, filesize($this->path) -2 );
        $footBytes = fread( $this->handle, 2 );
        
        if ( strcmp($headBytes, hex2bin($this->header)) === strcmp($footBytes, hex2bin($this->footer )) )
            return true;
        else
            return false;
    }

    public function process()
    {
        
    }
}