<?php
namespace Craft;

class RevManifestPlugin extends BasePlugin
{
	function getName()
	{
		return 'Rev Manifest';
	}

	function getVersion()
	{
		return '1.0.1';
	}

	function getSchemaVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'carlcs';
	}

	function getDeveloperUrl()
	{
		return 'https://github.com/carlcs/craft-revmanifest';
	}

	function getDocumentationUrl()
        {
                return 'https://github.com/carlcs/craft-revmanifest';
        }

	function getReleaseFeedUrl()
        {
                return 'https://github.com/carlcs/craft-revmanifest/raw/master/releases.json';
        }

        public function addTwigExtension()
	{
		Craft::import('plugins.revmanifest.twigextensions.RevManifestTwigExtension');
		return new RevManifestTwigExtension();
	}
}
