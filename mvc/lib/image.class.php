<?php
class Image {
    public static function upload($imageData) {
        $uploadsPath = ROOT . DS . 'web' . DS . 'uploads';

        if($imageData['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File uploading error.');
        }
        $info = getimagesize($imageData['tmp_name']);
        if($info === FALSE) {
            throw new Exception('File uploading error.');
        }
        if(($info[ 2 ] !== IMAGETYPE_GIF) && ($info[ 2 ] !== IMAGETYPE_JPEG) && ($info[ 2 ] !== IMAGETYPE_PNG)) {
            throw new Exception('File uploading error.');
        }

        // Build image path like /web/uploads/a/ab/abcd.jpg
        $imageFile = basename($imageData['name']);
        $imageFileParts = pathinfo($imageFile);
        $imageExt = $imageFileParts['extension'];
        $imageName = substr($imageFile, 0, -(strlen($imageExt) + 1));
        $imagePath = $uploadsPath;
        $imageUrl = '/uploads/';
        $imagePathPart1 = substr($imageName, 0, 1);
        if($imagePathPart1 && strlen( $imagePathPart1) == 1) {
            $imagePath .= DS . $imagePathPart1;
            $imageUrl .= "$imagePathPart1/";
            if(! is_dir($imagePath)) {
                mkdir($imagePath);
            }
        }
        $imagePathPart2 = substr($imageName, 0, 2);
        if($imagePathPart2 && strlen( $imagePathPart2) == 2) {
            $imagePath .= DS . $imagePathPart2;
            $imageUrl .= "$imagePathPart2/";
            if(! is_dir($imagePath)) {
                mkdir($imagePath);
            }
        }
        $imageFilePath = $imagePath . DS . $imageFile;
        $c = 0;
        while(file_exists($imageFilePath)) {
            $imageFile = $imageName . '-' . $c . '.' . $imageExt;
            $imageFilePath = $imagePath . DS . $imageFile;                   
            $c ++;
        }
        $imageUrl .= $imageFile;
        
        // Resize
        list($sourceWidth, $sourceHeight) = $info;
        $maxWidth = 320;
        $maxHeight = 240;
        $scale = min(min($maxWidth / $sourceWidth , $maxHeight / $sourceHeight) , 1);
        $newWidth = (int)($sourceWidth * $scale);
        $newHeight = (int)($sourceHeight * $scale);
        if($newWidth < $sourceWidth || $newHeight < $sourceHeight) {
            switch($info['mime']) {
                case 'image/gif':
                    $sourceImage = @imageCreateFromGif($imageData['tmp_name']);
                    break;                           
                case 'image/png':
                    $sourceImage = @imageCreateFromPNG($imageData['tmp_name']);
                    break;
                case 'image/jpg':
                case 'image/jpeg':
                default:
                    $sourceImage = @imageCreateFromJpeg($imageData['tmp_name']);
                    break;
            }
            $scaledImage = imagecreatetruecolor($newWidth, $newHeight);
            imageAlphaBlending($scaledImage, true);
            $white = imageColorExact($scaledImage, 255, 255, 255);
            imageFill($scaledImage, 0, 0, $white);
            imagecopyresampled ( 
                $scaledImage,
                $sourceImage,
                0,
                0,
                0,
                0,
                $newWidth,
                $newHeight,
                $sourceWidth,
                $sourceHeight
            );
            // Save resized
            switch($info['mime']) {
                case 'image/gif':
                    imagegif($scaledImage, $imageFilePath);
                    break;                           
                case 'image/png':
                    imagepng($scaledImage, $imageFilePath);
                    break;
                case 'image/jpg':
                case 'image/jpeg':
                default:
                    imagejpeg($scaledImage, $imageFilePath, 100);
                    break;
            }
        } else {
            move_uploaded_file($imageData['tmp_name'], $imageFilePath);
        }

        return $imageUrl;
    }
}