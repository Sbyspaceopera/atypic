const plugin = require('tailwindcss/plugin');

module.exports = {
	content: [
		'./**/*.php',
		'./src/**/*.js',
		'./assets/js/**/*.js',
		'!./assets/js/build/*.??',
		'!./build/*.??',
	],
	theme: {
		fontFamily: {
			title: ['"Abril Fatface"', 'cursive'],
		},
	},
	plugins: [
		plugin(function ({ addVariant }) {
			addVariant('child', '& > *');
			addVariant('child-hover', '& > *:hover');
		}),
	],
	corePlugins: {
		preflight: false,
	},
	important: true,
};
