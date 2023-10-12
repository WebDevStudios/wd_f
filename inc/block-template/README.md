# WDS Block Template

This template is configured to generate a block that is ready for block registration using the [`@wordpress/create-block`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-create-block/) tool.

## Usage

Run the following in the terminal of your choice:

`npx @wordpress/create-block@latest --template ../inc/block-template`


## Structure

Once the command has completed, the following structure will be created:

``` text
- src
--> {example-block}
---> block.json
---> edit.js
---> editor.scss
---> index.js
---> save.js
---> style.scss
---> view.js
.editorconfig
.eslintrc
.gitignore
{example-block}.php
package.json
```
