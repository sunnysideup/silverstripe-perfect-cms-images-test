<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use Sunnysideup\PerfectCmsImages\Forms\PerfectCmsImagesUploadField;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [
            'StandAlone' => Image::class,
            'Image' => Image::class,
            'TallImage' => Image::class,
            'WideImage' => Image::class,
            'PNGImage' => Image::class,
        ];

        private static $owns = [
            'StandAlone',
            'Image',
            'TallImage',
            'WideImage',
            'PNGImage',
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab('Root.Images', $image = PerfectCmsImagesUploadField::create('StandAlone', 'Stand Alone', null, 'standard'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('Image'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('TallImage'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('WideImage'));
            $fields->addFieldToTab('Root.Images', $image = UploadField::create('PNGImage'));
            return $fields;
        }
    }
}
