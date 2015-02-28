
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
			folders.bower + 'bootstrap/fonts/**',
			folders.bower + 'font-awesome/fonts/**',
			folders.bower + 'ionicons/fonts/**',
		],
		scripts: [
			//folders.bower + 'jquery-legacy/jquery.min.js',
			//folders.bower + 'jquery-migrate/jquery-migrate.min.js',
		]
	},

	// Frontend
	frontend: {
		js: [
			// use latest jQuery 1.x with migrate library
			folders.bower + 'jquery-legacy/dist/jquery.js',
			folders.bower + 'jquery-migrate/jquery-migrate.js',
			folders.bower + 'bootstrap/dist/js/bootstrap.min.js',

			// (optional) custom scripts
			folders.js + 'frontend.js',
		],
		css: [
			// switch to other bootswatch theme here, or use default bootstrap theme
			//folders.bower + 'bootstrap/dist/css/bootstrap.css',
			folders.bower + 'bootswatch/darkly/bootstrap.css',
			folders.bower + 'font-awesome/css/font-awesome.css',

			// (optional) custom files
			folders.css + 'frontend.css',
		],
	},

	// Backend
	backend: {
		js: [
			// use jQuery 1.x to compatible with GroceryCRUD
			folders.bower + 'jquery-legacy/dist/jquery.js',
			folders.bower + 'jquery-migrate/jquery-migrate.js',
			folders.bower + 'bootstrap/dist/js/bootstrap.js',
			folders.bower + 'adminlte/dist/js/app.js',
			folders.bower + 'adminlte/plugins/fastclick/fastclick.js',
            folders.bower + 'summernote/dist/summernote.js',
			folders.js + 'backend.js',

			// optional plugins
			//folders.bower + 'adminlte/plugins/iCheck/icheck.min.js',
		],
		css: [			
			// (optional) custom files
			folders.css + 'backend.css',

			folders.bower + 'bootstrap/dist/css/bootstrap.css',
			folders.bower + 'font-awesome/css/font-awesome.css',
			folders.bower + 'ionicons/css/ionicons.css',
			folders.bower + 'adminlte/dist/css/AdminLTE.css',
			folders.bower + 'adminlte/dist/css/skins/_all-skins.css',
            folders.bower + 'summernote/dist/summernote.css',

			// (optional) custom files
			folders.css + 'backend.css',

			// (optional) other AdminLTE plugins
			//folders.bower + 'adminlte/plugins/iCheck/all.css',
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

// Build scripts only
gulp.task('build', ['scripts', 'cssmin']);

// Clean up and build all
gulp.task('rebuild', ['clean', 'copy', 'images', 'build']);

// Default tasks
gulp.task('default', ['build', 'watch']);