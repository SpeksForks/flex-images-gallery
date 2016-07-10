<?php

class GalleryPage extends Page
{
    /**
     * @var string
     */
    private static $icon = 'flex-images-gallery/images/icons/gallery.png';

    /**
     * @var string
     */
    private static $description = 'Gallery page';

    /**
     * @var array
     */
    private static $db = array(
        'Height' => 'int',
    );

    /**
     * @var array
     */
    private static $has_many = array(
        'GalleryBlocks' => 'ContentBlock_Gallery',
    );

    /**
     * @var string
     */
    private static $many_many = array(
        'Images' => 'Image',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // remove the content block
        $fields->removeByName('Content');

        // Add a gallery gridfield for the images.
        $fields->addFieldToTab(
            'Root.Main',
            SortableGalleryField::create('Images'),
            'Metadata'
        );

        // add configuration tab for the height
        $fields->addFieldsToTab(
            'Root.Configuration',
            array(
                NoticeMessage::create('This value defines the height of an image row (in pixel).'),
                TextField::create('Height'),
            )
        );

        return $fields;
    }
}

class GalleryPage_Controller extends Page_Controller
{
    /**
     * add the requirements
     */
    public function init()
    {
        parent::init();

        // add the used libs in.
        Requirements::css(FLEX_IMAGES_GALLERY_MODULE_DIR . '/css/styles.css');
        Requirements::javascript(THIRDPARTY_DIR . '/jquery/jquery.js');
        Requirements::javascript(FLEX_IMAGES_GALLERY_MODULE_DIR . '/javascript/jquery.flex-images.js');
        Requirements::javascript(FLEX_IMAGES_GALLERY_MODULE_DIR . '/javascript/lightbox.js');

        // add the defined rowHeight to the js file
        Requirements::javascriptTemplate(
            FLEX_IMAGES_GALLERY_MODULE_DIR . '/javascript/GalleryPage.template.js',
            array(
                'rowHeight' => ($this->Height) ? $this->Height : 180,
            )
        );
    }
}
