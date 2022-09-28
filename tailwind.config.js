const plugin = require('tailwindcss/plugin')

module.exports = {
	content: [ './**/*.php','./src/**/*.js','./js/**/.js' ],
	theme: {
		fontFamily:{
			'title' : ['"Abril Fatface"', 'cursive']
		}
	},
	plugins: [
		plugin(function({addVariant}){
			addVariant('child', '& > *')
			addVariant('child-hover', '& > *:hover')
		})
	],
	corePlugins: {
		preflight: false,
	},
	important: true,
};
