<?php

class GalleryPageImageExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $db = array(
        'Caption' => 'varchar',
    );

    /**
     * @var array
     */
    private static $belongs_many_many = array(
        'Image' => 'GalleryPage'
    );

    /**
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('Caption', 'Caption', $this->owner->Caption),
            'Title'
        );
    }
}
