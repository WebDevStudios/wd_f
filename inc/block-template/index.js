const { join } = require( 'path' );

module.exports = {
	defaultValues: {
		description: 'The Block Description',
		author: 'WebDevStudios',
		category: 'wds-blocks-category',
		dashicon: 'pets',
		namespace: 'wds',
		folderName: 'src',
		editorScript: 'file:./index.js',
		editorStyle: 'file:./index.css',
		style: 'file:./style-index.css',
		viewScript: 'file:./view.js',
		example: {},
		supports: {
			html: false,
		},
		attributes: {},
		customScripts: {
			build: 'wp-scripts build',
			start: 'wp-scripts start',
		},
		devDependencies: {
			'@wordpress/scripts': '^26.14.0',
		},
	},
	templatesPath: join( __dirname, 'plugin' ),
	blockTemplatesPath: join( __dirname, 'block' ),
};
