# cubeupload/imageprocessor

_A library to check and verify incoming images, currently WIP_

Note - this readme is currently a living document so there's a mix of "what's now" and "what will be".

When we receive uploaded images, we need to make sure that someone's image named "my_cat.png" actually is a png file. In this library we're using the file's magic bytes to help determine what the file actually is.

## Intended Usage (eventually)

```php
$processor = new CubeUpload\ImageProcessor;
$processor->load( "image.png" );

if( $processor->validFile() )
  sendToStore( $processor->getSplFileInfo()->getPathname() );
else
  unlink( $processor->getSplFileInfo()->getPathname() );
```

## Image handlers
The library uses classes which deal with particular file extensions, the idea being that additional file types can be added later just by creating a new class.

Handler classes extend the `ImageHandler` base class and implement the `IImageHandler` interface. The interface will be requiring two methods to be implemented:
```php
public function valid();
public function process();
```

### Validation
This method makes sure the image is what it is described as being. The intention here is to check that an uploaded .png file actually IS a file in the portable network graphics format and not a zip file with a .png extension.

It's possible to hide compressed data within some file types so the `valid()` method is the place to check for this.

### Processing
This method is where we make any changes to the uploaded file, such as performing an anonymising operation to remove exif data.
