'use strict';

module.exports = {

  web: {
    src: [
      '<%= paths.bower %>/jquery/dist/jquery.js',
      '<%= paths.bower %>/bootstrap/js/collapse.js',
      '<%= paths.bower %>/bootstrap/js/tooltip.js',
      'src/Olesnica/WebBundle/Resources/public/js/**/*.js'
    ],
    dest: '<%= paths.temp %>/js/olesnica_web.js',
  },

  admin: {
    src: [
      '<%= paths.bower %>/jquery/dist/jquery.js',
      '<%= paths.bower %>/bootstrap/js/alert.js',
      '<%= paths.bower %>/bootstrap/js/collapse.js',
      '<%= paths.bower %>/bootstrap/js/modal.js',
      'src/Olesnica/AdminBundle/Resources/public/js/main.js'
    ],
    dest: '<%= paths.temp %>/js/olesnica_admin.js',
  }

};
