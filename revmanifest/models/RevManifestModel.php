<?php
namespace Craft;

class RevManifestModel extends BaseModel
{
    protected function defineAttributes()
    {
        return array(
            'manifestFolder' => AttributeType::String,
            'manifest'     => AttributeType::Mixed,
        );
    }
}
