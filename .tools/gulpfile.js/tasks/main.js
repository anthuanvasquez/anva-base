var gulp        = require( 'gulp' ),
    gutil       = require( 'gulp-util' ),
    runSequence = require( 'run-sequence' )
;

// Default task
gulp.task( 'default', [ 'watch', 'browsersync' ]);

// Build a working copy of the theme
gulp.task( 'build', [ 'wipe-build', 'images', 'fonts', 'scripts', 'styles', 'theme' ]);

// Create distribution copy
gulp.task( 'dist', [ 'dist' ]);

// Compress images - NOTE: this is a resource-intensive task!
gulp.task( 'optimize', [ 'images-optimize' ]);

// Tests - Lints
gulp.task( 'tests', () => {
    runSequence( 'sass-lint', 'css-lint', 'js-lint', 'php-lint', 'textdomain-lint' );
});

// Production
gulp.task( 'release', () => {
    gutil.env.prod = true;
    runSequence( 'sass-theme', 'sass-core', 'sass-admin' );
});
