<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Core\Config\Config;
    use SilverStripe\ORM\ArrayList;
    use SilverStripe\View\ArrayData;
    use Sunnysideup\PerfectCmsImages\Model\File\PerfectCMSImageDataExtension;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        public function PerfectCMSImagesLoop()
        {
            $list = Config::inst()->get(PerfectCMSImageDataExtension::class, 'perfect_cms_images_image_definitions');
            $al = ArrayList::create();
            foreach($list as $key => $item) {
                $item['key'] = $key;
                $al->push(
                    ArrayData::create(
                        $item
                    )
                );
            }

            return $al;
        }


        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }
    }
}
