/**
 * Load Plugins
 */

const { gulp, series, src, dest } = require('gulp');
const zip = require('gulp-zip');
const paths = require('path');

/**
 * Define Tasks
 */

function defaultTask(cb) {
	// place code for your default task here
	return src(
		[
			'*.php',
			'*.txt',
			'admin/**/*',
			'assets/**/*',
			'!assets/vendors/**/*.md',
			'!assets/vendors/**/*.map',
			'dist/**/*',
			'!dist/**/*.map',
			'includes/**/*',
			'languages/**/*',
			'public/**/*',
			'vendor/**/*',
			'!vendor/**/*.md',
			'!vendor/**/*.txt',
			'!vendor/**/*.pdf',
			'!vendor/**/LICENSE',
			'!vendor/**/CHANGES',
			'!vendor/**/README',
			'!vendor/**/VERSION',
			'!vendor/**/composer.json',
			'!vendor/**/.gitignore',
			'!vendor/**/doc',
			'!vendor/**/doc/**',
			'!vendor/**/docs',
			'!vendor/**/docs/**',
			'!vendor/**/test',
			'!vendor/**/test/**',
			'!vendor/**/tests',
			'!vendor/**/tests/**',
			'!vendor/**/unitTests',
			'!vendor/**/unitTests/**',
			'!vendor/**/.git',
			'!vendor/**/.git/**',
			'!vendor/**/examples',
			'!vendor/**/examples/**',
			'!vendor/**/build.xml',
			'!vendor/**/phpunit.xml',
			'!vendor/**/phpunit.xml.dist',
			'!vendor/**/*.xml'
		],
		{base: '.'}
	)
		.pipe(dest('../../../../../releases/fpwd-order-status-checker'));
}

exports.default = defaultTask
