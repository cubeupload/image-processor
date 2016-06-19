<?php namespace CubeUpload\ImageProcessor\Handlers;

interface IImageHandler
{
    public function open( $path );
    public function close();
    public function getMagicBytes();
    public function valid();
}