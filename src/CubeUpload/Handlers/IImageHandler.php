<?php namespace CubeUpload\Handlers;

interface IImageHandler
{
    public function open( $path );
    public function close();
    public function getMagicBytes();
    public function valid();
}