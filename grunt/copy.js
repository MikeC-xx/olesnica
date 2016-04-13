'use strict';

module.exports = {

  assets: {
    files: [
      {
        expand: true,
        cwd: 'src/Olesnica/WebBundle/Resources/public/images/',
        src: ['**/*.{png,jpg}'],
        dest:'<%= paths.dist %>/assets/images/'
      },
      {
        expand: true,
        cwd: 'src/Olesnica/WebBundle/Resources/public/css/',
        src: ['**/*.css'],
        dest:'<%= paths.dist %>/assets/css/'
      },
      {
        expand: true,
        cwd: '<%= paths.bower %>/bootstrap/fonts/',
        src: ['**/*.{eot,svg,ttf,woff,woff2}'],
        dest:'<%= paths.dist %>/assets/fonts/'
      },
      {
        expand: true,
        cwd: '<%= paths.node %>/tinymce/',
        src: ['**'],
        dest: '<%= paths.dist %>/assets/js/tinymce/'
      },
      {
        expand: true,
        cwd: 'src/Olesnica/AdminBundle/Resources/public/js/tinymce/',
        src: ['**'],
        dest: '<%= paths.dist %>/assets/js/tinymce/'
      },
      {
        expand: true,
        cwd: '<%= paths.node %>/jquery-locationpicker/dist/',
        src: ['*.{js,map}'],
        dest: '<%= paths.dist %>/assets/js/'
      }
    ]
  }

};
