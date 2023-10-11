const { join } = require( 'path' );

module.exports = {
	defaultValues: {
		folderName: 'src',
		editorScript: 'file:./index.js',
		editorStyle: 'file:./index.css',
		style: 'file:./style-index.css',
		viewScript: 'file:./view.js',
		main: 'file:./index.js',
		customScripts: {
			build: 'wp-scripts build',
			format: 'wp-scripts format',
			'lint:css': 'wp-scripts lint-style',
			'lint:js': 'wp-scripts lint-js',
			'packages-update': 'wp-scripts packages-update',
			'plugin-zip': 'wp-scripts plugin-zip',
			start: 'wp-scripts start',
		},
		devDependencies: {
			'@wordpress/scripts': '^26.14.0',
		},
	},
	templatesPath: join( __dirname, 'plugin' ),
	blockTemplatesPath: join( __dirname, 'block' ),
};
