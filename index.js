( function( wp ) {

	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var __ = wp.i18n.__;

	var useBlockProps = wp.blockEditor.useBlockProps;

	registerBlockType( 'mkaz/copyright-block', {
		apiVersion: 2,

		title: __(
			'Copyright Block',
			'copyright-block'
		),

		description: __(
			'Insert Copyright with current year',
			'copyright-block'
		),

		category: 'widgets',
		icon: 'smiley',

		supports: {
			html: false,
		},

		edit: function() {
			return el(
				'p',
				useBlockProps(),
				__( 'Copyright ', 'copyright-block' ).concat(' © ', (new Date()).getFullYear())
			);
		},

	} );
}(
	window.wp
) );
