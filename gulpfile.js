/*
 development (watch)
 gulp
 gulp --prod (minified && babel)

 production
 gulp build --prod (minified && babel)

 */

const { src, dest, parallel, task, watch } = require('gulp');

const gulpIf = require('gulp-if');

// scss
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const csso = require('gulp-csso');

// js
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

const isProd = ['--p', '--prod', '--production'].some(item => process.argv.includes(item));
const isDev = !isProd;

const devPath = './assets/dev/';
const buildPath = './assets/'

const styles = () => {
	return src(`${devPath}scss/*.scss`)
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(csso({ restructure: true }))
		.pipe(dest(`${buildPath}css`))
};

const jsHandler = () => {
	return src([
		`${devPath}js/wow.min.js`,
		`${devPath}js/common.js`,
	])
	.pipe(gulpIf(isProd, babel({
		presets: ['@babel/env']
	})))
	.pipe(gulpIf(isProd, uglify()))
	.pipe(concat('bundle.js'))
	.pipe(dest(`${buildPath}js`))
};


const watchTask = () => {
	watch(`${devPath}scss/**/*.scss`, styles);
	watch(`${devPath}js/**/*.js`, jsHandler);
};

const buildTask = parallel(styles, jsHandler);

task('js', jsHandler);
task('css', styles);
task('build', buildTask);
task('default', watchTask);
