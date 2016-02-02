<?php
namespace Craft;

class RevManifestPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Rev Manifest';
    }

    public function getVersion()
    {
        return '1.0.2';
    }

    public function getSchemaVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'carlcs';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/carlcs/craft-revmanifest';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/carlcs/craft-revmanifest';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/carlcs/craft-revmanifest/raw/master/releases.json';
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.revmanifest.twigextensions.RevManifestTwigExtension');
        return new RevManifestTwigExtension();
    }
}
