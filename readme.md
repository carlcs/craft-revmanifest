# Rev Manifest plugin for Craft CMS

A Craft plugin to look up a static asset's filename in an asset revisioning manifest like the one [gulp-rev][1] outputs.

## Installation

To install the plugin, copy the revmanifest/ folder into craft/plugins/. Then go to Settings → Plugins and click the "Install" button next to "Rev Manifest".

## Twig function

### revUrl( assetPath )

Looks up an asset path in the manifest and returns the asset revision's URL.

```twig
{{ revUrl('assets/stylesheets/app.css') }}

{# outputs assets/stylesheets/app-a930f9af02.css #}
```

If the asset path is not present in the manifest it will return the URL for the original asset.

The asset revision's path will be appended to your Site URL. Set the Site URL in Craft's [config settings][2] and Craft doesn't have to fetch it from the database.


#### Parameters

`assetPath`
:   The original asset path.

## Settings

You can set the path to your manifest file in Craft's [config settings][2]. Without configuration, the plugins expects the manifest file in assets/rev-manifest.json.

```php
'revManifestPath' => 'rev-manifest.json'
```


  [1]: https://github.com/sindresorhus/gulp-rev
  [2]: https://craftcms.com/docs/config-settings
