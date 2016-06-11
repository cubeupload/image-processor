<?php namespace CubeUpload\Handlers;

class ImageHandler
{
    protected $handle;
    protected $path;
    public function open( $path )
    {
        if( file_exists( $path ) )
        {
            $this->handle = fopen( $path, "rb" );
            $this->path = $path;   
        }
        else
            throw new \Exception( "File not found" );
    }
    
    public function close()
    {
        fclose( $this->handle );
    }
}