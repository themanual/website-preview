module.exports = function(grunt) {
  
  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    // CSS:
    // * Sass
    // * Minify
    sass: {
      dev: {
        options: {
          style:      'expanded',
          loadPath:   ['bower_components'],
          require:    ['./sass_functions/base64.rb', './sass_functions/url_encode.rb']
        },
        files: [
          {
            expand: true,
            cwd:  'html/assets/css/src/',
            src:  ['*.scss', '!_*.scss'],
            dest: 'html/assets/css/build/',
            ext:  '.css'
          }
        ]
      }
    },

    cssmin: {
      minify: {
        expand: true,
        cwd:  'html/assets/css/build/',
        src:  ['*.css', '!*.min.css'],
        dest: 'html/assets/css/build/',
        ext:  '.min.css'
      }
    },



    // JS:
    // * Hint source files
    // * Concat libs and source files
    // * Minify
    jshint: {
      files: ['Gruntfile.js', 'html/assets/js/src/*.js'],
      options: {
        expr: true,
        sub: true,
        globals: {
          jQuery: true,
          console: true
        }
      }
    },

    concat: {
      js: {
        src: [
          'bower_components/jquery/jquery.js',
          // 'bower_components/fitvids/jquery.fitvids.js',
          'bower_components/trmix/dist/trmix.js',
          'html/assets/js/src/main.js'
        ],
        dest: 'html/assets/js/build/main.js'
      }
    },

    uglify: {
      dev: {
        expand: true,
        cwd:    'html/assets/js/build/',
        src:    ['*.js', "!*.min.js"],
        dest:   'html/assets/js/build/',
        ext:    '.min.js'
      }
    },

    notify: {
      options: { title: 'Grunt'},
      css:  { options: { message: 'CSS: Done' } },
      js:   { options: { message: 'JS: Done' } }
    },





    // Watch
    watch: {

      options: {
        livereload: true
      },

      html: {
        files: ['html/**/*.php', 'data/**/*']
      },

      css: {
        files:  'html/assets/css/src/**/*',
        tasks:  'css:dev'
      },

      js: {
        files: ['assets/js/src/**/*'],
        tasks: 'js:dev'
      },
    }

  });
  
  // Build CSS and JS
  // but do not copy or notify
  grunt.registerTask('css:dev', ['sass:dev', 'cssmin:minify', 'notify:css']);
  grunt.registerTask('js:dev',  ['jshint', 'concat:js', 'uglify', 'notify:js']);

  // Build CSS, JS, and Jekyll
  grunt.registerTask('build', ['css:dev', 'js:dev']);

  // Build for development, and watch
  grunt.registerTask('default',   ['build', 'watch']);

};