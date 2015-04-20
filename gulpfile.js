var gulp = require('gulp');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');

gulp.task('browserify', function() {
	return browserify('resources/assets/js/app.js')
				.transform(babelify, { stage: 0 })
				.bundle();
});

gulp.task('watch', function() {
	gulp.watch('**/*.js', ['browserify']);
});