<?php
namespace Craft;

class RevManifestService extends BaseApplicationComponent
{
    // Properties
    // =========================================================================

    private $_manifest;

    // Public Methods
    // =========================================================================

    /**
     * Looks up an asset path in the manifest and returns the asset revision's URL.
     *
     * @param string $assetPath
     *
     * @return string
     */
    public function getRevUrl($assetPath = '')
    {
        $manifest = $this->getManifest();

        if ($manifest) {
            if (substr($assetPath, 0, strlen($manifest->manifestFolder)) == $manifest->manifestFolder) {
                $assetPath = substr($assetPath, strlen($manifest->manifestFolder));
            }

            if (array_key_exists($assetPath, $manifest->manifest)) {
                $revAssetPath = $manifest->manifestFolder;
                $revAssetPath .= $manifest->manifest[$assetPath];

                return UrlHelper::getUrl($revAssetPath);
            }
        }

        return UrlHelper::getUrl($assetPath);
    }

    /**
     * Returns the revisioning manifest model.
     *
     * @return RevManifestModel|null
     */
    public function getManifest()
    {
        $status = craft()->config->get('revManifest');

        if (!$this->_manifest && $status !== false) {
            $manifestPath = craft()->config->get('revManifestPath');

            if (!$manifestPath) {
                $manifestPath = craft()->config->get('revManifestPath', 'revmanifest');
            }

            if (!file_exists($manifestPath)) {
                Craft::log(Craft::t('(Rev Manifest) The manifest file “{file}” doesn\'t exists.', array('file' => $manifestPath)), LogLevel::Error);

                return null;
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);

            if (!$manifest) {
                Craft::log(Craft::t('(Rev Manifest) There was a problem reading the manifest file “{file}”.', array('file' => $manifestPath)), LogLevel::Error);

                return null;
            }

            $this->_manifest = new RevManifestModel();

            $this->_manifest->manifest       = $manifest;
            $this->_manifest->manifestFolder = IOHelper::getFolderName($manifestPath);
        }

        return $this->_manifest;
    }
}
