/**
 * Heisenberg Toolkit Gulpfile
 *
 * USAGE local:
 * gulp
 *
 * USAGE production:
 * gulp --production
 *
 * In production heisenberg will uglify your JS and minify your SASS and
 * obviously not turn on live reload
 *
 * Live Reload is turned on by default, if you DO NOT want to use it:
 * gulp --noreload
 * - or -
 * gulp --production
 *
 * Chrome Plugin:
 * https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei?hl=en
 *
 * Firefox Plugin:
 * https://addons.mozilla.org/en-us/firefox/addon/livereload/
 */

/**
 * Why don't I use gulp-load-plugins here?  Wouldn't that make
 * this easier? Sure, except for the fact that the plugin list
 * then becomes a black box.  Personally, I don't like that
 * plugin because it forces me to have to look in a different file
 * to find out if you have a specific plugin and I'm lazy.
 *
 */
var gulp       = require('gulp'),
    del        = require('del'),
    gulpif     = require('gulp-if'),
    wrap       = require('gulp-wrap'),
    sass       = require('gulp-sass'),
    yargs      = require('yargs').argv
    bower      = require('gulp-bower'),
    concat     = require('gulp-concat'),
    notify     = require('gulp-notify'),
    uglify     = require('gulp-uglify'),
    plumber    = require('gulp-plumber'),
    declare    = require('gulp-declare'),
    imagemin   = require('gulp-imagemin'),
    sourcemaps = require('gulp-sourcemaps'),
    handlebars = require('gulp-handlebars'),
    livereload = require('gulp-livereload'),
    prefixer   = require('gulp-autoprefixer'),
    pngquant   = require('imagemin-pngquant');

var config = {
   dest: {
      js:     "public/assets/js/",
      css:    "public/assets/css/",
      imgs:   "public/assets/images/",
      fonts:  "public/assets/fonts/"
   },
   src: {
      js:    "resources/assets/js/",
      hbs:   "resources/assets/js/templates/",
      sass:  "resources/assets/sass/",
      imgs:  "resources/assets/images/",
      tmpl:  "templates.tpl",
      bower: "resources/assets/bower/"
   }
};

/**
 * Scripts object-array
 * These are the various JS scripts that are being used in the site.
 * There are a couple of things going on here so let's take a look
 */
var scripts = {
   // jQuery and Modernizr should not be concatenated with everything else
   // Why? Modernizer needs to be in the <head> and jQuery only needs to be
   // loaded IF the google CDN version fails to load
   jquery:     [config.src.bower + "jquery/dist/jquery.js"],
   modernizr:  [config.src.bower + "modernizr/modernizr.js"],

   main: [
      config.src.bower + "jquery-validation/dist/jquery.validate.js",
      config.src.bower + "underscore/underscore.js",
      config.src.bower + "momentjs/moment.js",
      config.src.bower + "livestampjs/livestamp.js",
      config.src.bower + "handlebars/handlebars.runtime.js",
      config.src.bower + "amplify/lib/amplify.js",
      config.src.js    + config.src.tmpl,
      config.src.js    + "app.js",
      config.src.js    + "resources/**/*.js",
      config.src.js    + "helpers/**/*.js",
      config.src.js    + "modules/**/*.js",
      config.src.js    + "main.js"
   ],
};

// Grab latest from Bower .....................................................
gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.src.bower));
});

// Blow out the destination files on fresh compile ............................
gulp.task('cleaner', function () {
   del([
      config.dest.css   + "**/*.*",
      config.dest.js    + "**/*.*",
      config.dest.imgs  + "**/*.*",
      config.dest.fonts + "**/*.*"
   ]);
});

// Copy assets to public folder ...............................................
gulp.task('copy', ['bower'], function () {
   gulp.src([config.src.bower +"fontawesome/fonts/fontawesome-webfont.*"])
      .pipe(gulp.dest(config.dest.fonts));
});

// Minify images ..............................................................
gulp.task('imagemin', ['bower'], function () {
    return gulp.src(config.src.imgs + '**/*.*')
        .pipe(plumber({errorHandler: notify.onError("Imagemin Error:\n<%= error.message %>")}))
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(config.dest.imgs))
        .pipe(livereload());
});

// Compile handlebars templates ...............................................
gulp.task('handlebars', function () {
    gulp.src(config.src.hbs+'*.hbs')
      .pipe(plumber({errorHandler: notify.onError("Handlebars Error:\n<%= error.message %>")}))
      .pipe(handlebars())
      .pipe(wrap('Handlebars.template(<%= contents %>)'))
      .pipe(declare({
          namespace: 'Handlebars.templates',
          noRedeclare: true,
      }))
      .pipe(concat(config.src.tmpl))
      .pipe(gulp.dest(config.src.js))
      .pipe(livereload());
});

// Do everything to JavaScript ................................................
gulp.task('js', ['bower','handlebars'], function() {
   gulp.src(scripts.modernizr)
       .pipe(plumber({errorHandler: notify.onError("JS Error:\n<%= error.message %>")}))
       .pipe(concat("modernizr.min.js"))
       .pipe(gulpif(yargs.production, uglify()))
       .pipe(gulp.dest(config.dest.js))
       .pipe(livereload());

   gulp.src(scripts.jquery)
       .pipe(plumber({errorHandler: notify.onError("JS Error:\n<%= error.message %>")}))
       .pipe(concat("jquery.min.js"))
       .pipe(gulpif(yargs.production, uglify()))
       .pipe(gulp.dest(config.dest.js))
       .pipe(livereload());

   gulp.src(scripts.main)
       .pipe(plumber({errorHandler: notify.onError("JS Error:\n<%= error.message %>")}))
       .pipe(sourcemaps.init())
          .pipe(concat("app.min.js"))
          .pipe(gulpif(yargs.production, uglify()))
       .pipe(sourcemaps.write())
       .pipe(gulp.dest(config.dest.js))
       .pipe(livereload());
});

// Compile the Sass ...........................................................
gulp.task('sass', ['bower'], function () {
   gulp.src(config.src.sass + '*.scss')
       .pipe(plumber({errorHandler: notify.onError("Sass Error:\n<%= error.message %>")}))
       .pipe(sourcemaps.init())
          .pipe(sass({
             outputStyle: yargs.production ? "compressed" : "nested"
          }))
          .pipe(prefixer({
             browsers: ['last 2 versions'],
             cascade: false,
             remove: true
           }))
       .pipe(sourcemaps.write())
       .pipe(gulp.dest(config.dest.css))
       .pipe(livereload());
});

// Watch for changes ..........................................................
gulp.task('watch', function () {
   if (!yargs.noreload && !yargs.production) {
      livereload.listen();
   }
   gulp.watch(config.src.js   + '**/*.js',   ['js']);
   gulp.watch(config.src.hbs  + '**/*.hbs',  ['handlebars', 'js']);
   gulp.watch(config.src.sass + '**/*.scss', ['sass']);
   gulp.watch(config.src.imgs + '**/*.*',    ['imagemin']);
});

gulp.task('clean',   ['cleaner']);
gulp.task('compile', ['bower', 'copy', 'js', 'sass', 'imagemin']);
gulp.task('default', ['bower', 'copy', 'js', 'sass', 'imagemin','watch']);


