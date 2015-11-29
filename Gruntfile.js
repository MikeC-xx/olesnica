module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: false,
          yicomporess: false,
          optimization: 2
        },
        files: {
          'web/assets/css/olesnica_web.css': 'src/Olesnica/WebBundle/Resources/public/less/main.less',
          'web/assets/css/olesnica_admin.css': 'src/Olesnica/AdminBundle/Resources/public/less/main.less'
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
        dest: 'web/assets/js/olesnica_web.js',
      },
      admin: {
        src: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/bootstrap/js/alert.js',
          'bower_components/bootstrap/js/collapse.js',
          'bower_components/bootstrap/js/modal.js',
          'src/Olesnica/AdminBundle/Resources/public/js/**/*.js'
        ],
        dest: 'web/assets/js/olesnica_admin.js',
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
            cwd: 'src/Olesnica/AdminBundle/js/tinymce/',
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
        tasks: ['less', 'concat', 'copy'],
        options: {
          nospawn: true
        }
      }
    }
  });

  grunt.registerTask('default', ['less', 'concat', 'copy']);
};
