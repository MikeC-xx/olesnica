module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    clean: {
      assets: [
        'web/assets'
      ],
      temp: '.tmp',
    },
    less: {
      development: {
        options: {
          compress: false,
          yicomporess: false,
          optimization: 2
        },
        files: {
          '.tmp/css/olesnica_web.css': 'src/Olesnica/WebBundle/Resources/public/less/main.less',
          '.tmp/css/olesnica_web_all.css': 'src/Olesnica/WebBundle/Resources/public/less/main_all.less',
          '.tmp/css/olesnica_admin.css': 'src/Olesnica/AdminBundle/Resources/public/less/main.less'
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      web: {
        src: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/bootstrap/js/collapse.js',
          'bower_components/bootstrap/js/tooltip.js',
          'src/Olesnica/WebBundle/Resources/public/js/**/*.js'
        ],
        dest: '.tmp/js/olesnica_web.js',
      },
      admin: {
        src: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/bootstrap/js/alert.js',
          'bower_components/bootstrap/js/collapse.js',
          'bower_components/bootstrap/js/modal.js',
          'src/Olesnica/AdminBundle/Resources/public/js/main.js'
        ],
        dest: '.tmp/js/olesnica_admin.js',
      }
    },
    postcss: {
      options: {
        processors: [
          require('pixrem')(),
          require('autoprefixer')({
            browsers: [
              'Android 2.3',
              'Android >= 4',
              'Chrome >= 20',
              'Firefox >= 38', // Latest ESR
              'Explorer >= 8',
              'iOS >= 6',
              'Opera >= 12',
              'Safari >= 6',
            ],
          }),
          require('cssnano')(),
        ],
      },
      web: {
        src: '.tmp/css/olesnica_web.css',
        dest: 'web/assets/css/olesnica_web.min.css'
      },
      webAll: {
        src: '.tmp/css/olesnica_web_all.css',
        dest: 'web/assets/css/olesnica_web_all.min.css'
      },
      admin: {
        src: '.tmp/css/olesnica_admin.css',
        dest: 'web/assets/css/olesnica_admin.min.css'
      }
    },
    uglify: {
      options: {

      },
      web: {
        files: {
          'web/assets/js/olesnica_web.min.js': ['.tmp/js/olesnica_web.js']
        }
      },
      admin: {
        files: {
          'web/assets/js/olesnica_admin.min.js': ['.tmp/js/olesnica_admin.js'],
          'web/assets/js/event.min.js': ['src/Olesnica/AdminBundle/Resources/public/js/event.js']
        }
      }
    },
    copy: {
      assets: {
        files: [
          {
            expand: true,
            cwd: 'src/Olesnica/WebBundle/Resources/public/images/',
            src: ['**/*.{png,jpg,svg}'],
            dest:'web/assets/images/'
          },
          {
            expand: true,
            cwd: 'src/Olesnica/WebBundle/Resources/public/css/',
            src: ['**/*.css'],
            dest:'web/assets/css/'
          },
          {
            expand: true,
            cwd: 'bower_components/bootstrap/fonts/',
            src: ['**/*.{eot,svg,ttf,woff,woff2}'],
            dest:'web/assets/fonts/'
          },
          {
            expand: true,
            cwd: 'node_modules/tinymce/',
            src: ['**'],
            dest: 'web/assets/js/tinymce/'
          },
          {
            expand: true,
            cwd: 'src/Olesnica/AdminBundle/Resources/public/js/tinymce/',
            src: ['**'],
            dest: 'web/assets/js/tinymce/'
          },
          {
            expand: true,
            cwd: 'node_modules/jquery-locationpicker/dist/',
            src: ['*.{js,map}'],
            dest: 'web/assets/js/'
          }
        ]
      }
    },
    watch: {
      styles: {
        files: [
          // Web
          'src/Olesnica/WebBundle/Resources/public/less/**/*.less',
          'src/Olesnica/WebBundle/Resources/public/js/**/*.js',
          'src/Olesnica/WebBundle/Resources/public/images/**/*',
          // Admin
          'src/Olesnica/AdminBundle/Resources/public/less/**/*.less',
          'src/Olesnica/AdminBundle/Resources/public/js/**/*.js',
          'src/Olesnica/AdminBundle/Resources/public/images/**/*',
        ],
        tasks: ['clean', 'less', 'concat', 'postcss', 'uglify', 'copy'],
        options: {
          nospawn: true
        }
      }
    }
  });

  grunt.registerTask('default', ['clean', 'less', 'concat', 'postcss', 'uglify', 'copy']);
};
