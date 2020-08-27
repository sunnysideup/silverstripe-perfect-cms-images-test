<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [
            'Image' => Image::class,
            'TallImage' => Image::class,
            'WideImage' => Image::class,
            'PNGImage' => Image::class,
        ];

        private static $owns = [
            'Image',
            'TallImage',
            'WideImage',
            'PNGImage',
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('Image'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('TallImage'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('WideImage'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('PNGImage'));
            return $fields;
        }
    }
}
