/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import metadata from './block.json';

import apiFetch from '@wordpress/api-fetch';
const plugins = await apiFetch( { path: '/wp/v2/plugins' } );

const isACFProEnabled = plugins.find(
	( plugin ) =>
		plugin.plugin === 'advanced-custom-fields-pro/acf' &&
		plugin.status === 'active'
);

if ( ! isACFProEnabled ) {
	/**
	 * Every block starts by registering a new block type definition.
	 *
	 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
	 */
	registerBlockType( metadata.name, {
		...metadata,
		/**
		 * @see ./edit.js
		 */
		edit: Edit,
	} );
}
