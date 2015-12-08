<?php
namespace Craft;

class RevManifestTwigExtension extends \Twig_Extension
{
	/**
	 * Returns the name of the extension.
	 *
	 * @return string The extension name
	 */
	public function getName()
	{
		return 'Rev Manifest';
	}

	/**
	 * Returns a list of functions to add to the existing list.
	 *
	 * @return array An array of functions
	 */
	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction('revUrl', array($this, 'revUrlFunction')),
		);
	}

	/**
	 * Looks up an asset path in the manifest and returns the asset revision's URL.
	 *
	 * @param string $assetPath
	 *
	 * @return string
	 */
        public function revUrlFunction($assetPath = '')
	{
                return craft()->revManifest->getRevUrl($assetPath);
	}
}
