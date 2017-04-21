var gulp            = require('gulp'),
    sass            = require('gulp-sass'),
    browserSync     = require('browser-sync'),
    concat          = require('gulp-concat'),
    uglify          = require('gulp-uglify'),
    rename          = require('gulp-rename'),
    cssnano         = require('gulp-cssnano'),
    del             = require('del'),
    autoprefixer    = require('gulp-autoprefixer'),
    sourcemaps      = require('gulp-sourcemaps');

gulp.task('sass', function(){
    return gulp.src('app/sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: false }))
        .pipe(sourcemaps.write('../css', {addComment: false}))
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({stream: true}))
});

gulp.task('browser-sync', function() {
    browserSync({
        server: {
            baseDir: 'app'
        },
        notify: false
    });
});

gulp.task('scripts', function() {
    return gulp.src([
        // 'app/libs/modernizr.js',
        'app/libs/jquery/dist/jquery.min.js',
        'app/libs/bootstrap/dist/js/bootstrap.js',
        'app/libs/sweetalert2/dist/sweetalert2.min.js',
        'app/libs/zoomwall/zoomwall.js',
        'app/libs/lityjs/dist/lity.js',
        'app/libs/slicknav/dist/jquery.slicknav.js',
        // 'app/libs/jquery.maskedinput/dist/jquery.maskedinput.js',
        // 'app/libs/headroom.js/dist/headroom.js',
        // 'app/libs/jquery-scrollto.js',
        // 'app/libs/jquery.scrollTo/jquery.scrollTo.js',
        'app/libs/owl.carousel/dist/owl.carousel.js',
        // 'app/libs/stickUp.js'
        // 'app/libs/vue/dist/vue.min.js',
        ])
        .pipe(concat('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('app/js'));
});

gulp.task('css-libs', ['sass'], function() {
    return gulp.src('app/css/libs.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('app/css'));
});

gulp.task('watch', ['browser-sync', 'css-libs', 'scripts'], function() {
    gulp.watch('app/sass/**/*.scss', ['sass']);
    gulp.watch('app/*.html', browserSync.reload);
    gulp.watch('app/js/**/*.js', browserSync.reload);
});

// ----------------------Дефолтный таск gulp --------------------------------

gulp.task('default', ['watch']);