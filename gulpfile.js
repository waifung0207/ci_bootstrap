
var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-minify-css');
var imagemin = require('gulp-imagemin');
var changed = require('gulp-changed');
var del = require('del');

/**
 * Base folders to source files
 */
var folders = {
	bower: 'bower_components/',
	js: 'assets/js/',
	css: 'assets/styles/',
	fonts: 'assets/fonts/',
	images: 'assets/images/',

	// target folder of post-processed files
	dist: 'assets/dist/',
}

/**
 * Paths to be used by Gulp
 */
var paths = {

	// Raw assets to copy directly
	copy: {
		fonts: [
			folders.bower + 'AdminLTE/fonts/**',
			folders.bower + 'font-awesome/fonts/**',
			folders.bower + 'ionicons/fonts/**',
		],
		scripts: [
			folders.bower + 'jquery/dist/jquery.min.js',
			folders.bower + 'jquery-migrate/jquery-migrate.min.js',
			//folders.bower + 'jquery-legacy/jquery.min.js',
			//folders.bower + 'jquery-legacy/jquery.migrate.min.js',
		]
	},

	// Frontend specific
	frontend: {
		js: [
			// use latest jQuery (2.x) with migrate library
			folders.bower + 'jquery/dist/jquery.js',
			folders.bower + 'jquery-migrate/jquery-migrate.js',
			folders.bower + 'bootstrap/dist/js/bootstrap.min.js',

			// (optional) custom files
			//folders.js + 'base.js',
		],
		css: [
			//folders.bower + 'bootstrap/dist/css/bootstrap.min.css',
			folders.bower + 'bootswatch/darkly/bootstrap.min.css',
			folders.bower + 'font-awesome/css/font-awesome.min.css',

			// (optional) custom files
			folders.css + 'frontend.css',
		],
	},

	/**
	 * Backend-specific
	 */
	backend: {
		js: [
			// use jQuery 1.x to compatible with GroceryCRUD
			folders.bower + 'jquery-legacy/dist/jquery.js',
			folders.bower + 'jquery-migrate/jquery-migrate.js',
			folders.bower + 'bootstrap/dist/js/bootstrap.min.js',
			folders.bower + 'AdminLTE/js/AdminLTE/app.js',
			folders.js + 'backend.js',
		],
		css: [
			folders.bower + 'bootstrap/dist/css/bootstrap.min.css',
			folders.bower + 'font-awesome/css/font-awesome.min.css',
			folders.bower + 'ionicons/css/ionicons.min.css',
			folders.bower + 'AdminLTE/css/AdminLTE.css',

			// (optional) AdminLTE theme plugins
			//folders.bower + 'AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
			
			// (optional) custom files
			folders.css + 'backend.css',
		],
	},
};


/**
 * [clean]: to empty destination folder
 */
gulp.task('clean', function(cb) {
	del([folders.dist + '**/*'], cb);
});


/**
 * [copy]: to copy required files without change
 */
gulp.task('copy:fonts', function() {
	gulp.src(paths.copy.fonts)
		.pipe(gulp.dest(folders.fonts));
});
gulp.task('copy:scripts', function() {
	gulp.src(paths.copy.scripts)
		.pipe(gulp.dest(folders.dist));
});
gulp.task('copy', ['copy:fonts', 'copy:scripts']);


/**
 * [scripts]: to minify JS files
 */
gulp.task('scripts:frontend', function() {
	return gulp.src(paths.frontend.js)
		.pipe(changed(folders.dist))
		.pipe(uglify())
		.pipe(concat('app.min.js'))
		.pipe(gulp.dest(folders.dist));
});
gulp.task('scripts:backend', function() {
	return gulp.src(paths.backend.js)
		.pipe(changed(folders.dist))
		.pipe(uglify())
		.pipe(concat('backend.min.js'))
		.pipe(gulp.dest(folders.dist));
});
gulp.task('scripts', ['scripts:frontend', 'scripts:backend']);


/**
 * [cssmin]: to minify stylesheets
 */
gulp.task('cssmin:frontend', function() {
	return gulp.src(paths.frontend.css)
		.pipe(changed(folders.dist))
		.pipe(cssmin({
			keepBreaks: false
		}))
		.pipe(concat('app.min.css'))
		.pipe(gulp.dest(folders.dist))
});
gulp.task('cssmin:backend', function() {
	return gulp.src(paths.backend.css)
		.pipe(changed(folders.dist))
		.pipe(cssmin({
			keepBreaks: false
		}))
		.pipe(concat('backend.min.css'))
		.pipe(gulp.dest(folders.dist))
});
gulp.task('cssmin', ['cssmin:frontend', 'cssmin:backend']);


/**
 * [images]: to optimize static images
 */
gulp.task('images', function() {
	return gulp.src(folders.images + '**/*.{png,jpg,gif}')
		.pipe(changed(folders.dist + 'images/'))
		.pipe(imagemin({
			progressive: true,
			optimizationLevel: 5
		}))
		.pipe(gulp.dest(folders.dist + 'images/'));
});


/**
 * [watch]: to rerun the task when a file changes
 */
gulp.task('watch', function() {
	gulp.watch(paths.frontend.js, ['scripts:frontend']);
	gulp.watch(paths.backend.js, ['scripts:backend']);
	gulp.watch(paths.frontend.css, ['cssmin:frontend']);
	gulp.watch(paths.backend.css, ['cssmin:backend']);
	gulp.watch(paths.images, ['images']);
});


// Build only
gulp.task('build', ['copy', 'scripts', 'cssmin', 'images']);

// Default tasks
gulp.task('default', ['clean', 'watch', 'build']);