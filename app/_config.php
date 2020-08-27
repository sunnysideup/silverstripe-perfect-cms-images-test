<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;
use SilverStripe\Core\Config\Config;
use Sunnysideup\PerfectCmsImages\Model\File\PerfectCMSImageDataExtension;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);

$perfectCMSOptions = createPerfectCMSOptions();

//check syntax!!!!!
Config::modify()->merge(PerfectCMSImageDataExtension::class, 'perfect_cms_images_image_definitions', $perfectCMSOptions);

function createPerfectCMSOptions() {
    $titleA = [];
    $imageArray = [];

    $heightA = [0, 300];
    foreach($heightA as $height) {
        if($height === 0) {
            $titleA['height'] = 'height: flexible';
        } else {
            $titleA['height'] = 'height: '.$height.'px';
        }

        $widthA = [0, 300];
        foreach($widthA as $width) {
            if($width === 0) {
                $titleA['width'] = 'width: flexible';
            } else {
                $titleA['width'] = 'width: '.$width.'px';
            }

            $enforceSizeA = [0, 1];
            foreach($enforceSizeA as $enforceSize) {
                $titleA['enforceSize'] = 'enforce size: '.($enforceSize ? 'yes' : 'no').'';

                $filetypeA = ['png'];
                foreach($filetypeA as $filetype) {
                    $titleA['fileType'] = 'file type: '. $filetype .'';

                    $useRetinaA = [0, 1];
                    foreach($useRetinaA as $useRetina) {
                        $titleA['useRetina'] = 'uses retina: ' . ($useRetina ? 'yes' : 'no') . '';

                        $paddingBGColourA = ['#334455', '#ffffff'];
                        foreach($paddingBGColourA as $paddingBGColour) {
                            $titleA['bgColour'] = 'bg color: ' . $paddingBGColour . '';

                            $cropA = [0, 1];
                            foreach($cropA as $crop) {
                                $titleA['isCropped'] = 'is cropped: ' . $crop . '';

                                //now lets make the array
                                $imageCount = (count($imageArray) + 1);
                                $imageArray['testimage'.$imageCount] = [
                                    'width' => $width,
                                    'height' => $height,
                                    'enforce_size' => $enforceSize,
                                    'folder' => 'my-awesome-folder',
                                    'filetype' => $filetype,
                                    'use_retina' => $useRetina,
                                    'padding_bg_colour' => $paddingBGColour,
                                    'crop' => $crop,
                                    //add these just for demo purposes
                                    'Title' => implode('<br>', $titleA),
                                ];
                            }

                        }

                    }

                }

            }

        }

    }

    return $imageArray;

}
