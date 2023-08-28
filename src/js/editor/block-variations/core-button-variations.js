wp.domReady( () => {
	wp.blocks.registerBlockVariation( 'core/buttons', [
		{
			name: 'wide',
			title: 'Wide Buttons',
			attributes: {
				className: 'is-wide',
			},
		},
		{
			name: 'full',
			title: 'Full Buttons',
			attributes: {
				className: 'is-full',
			},
		},
	] );
} );
