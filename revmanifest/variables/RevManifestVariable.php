<?php
namespace Craft;

class RevManifestVariable
{
        /**
	 * Looks up an asset path in the manifest and returns the asset revision's URL.
	 *
	 * @param string $assetPath
	 *
	 * @return string
	 */
        public function revUrl($assetPath = '')
	{
                return craft()->revManifest->getRevUrl($assetPath);
	}
}
