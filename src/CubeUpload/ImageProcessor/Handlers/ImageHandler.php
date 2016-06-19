<?php namespace CubeUpload\ImageProcessor\Handlers;

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

    public function canProcess()
    {
        $class = get_class( $this );

        if( in_array( "process", get_class_methods( $class )) )
            return true;
        else
            return false;
    }
}