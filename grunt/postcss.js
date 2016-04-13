'use strict';

module.exports = {

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
    src: '<%= paths.temp %>/css/olesnica_web.css',
    dest: '<%= paths.dist %>/assets/css/olesnica_web.min.css'
  },

  webAll: {
    src: '<%= paths.temp %>/css/olesnica_web_all.css',
    dest: '<%= paths.dist %>/assets/css/olesnica_web_all.min.css'
  },

  admin: {
    src: '<%= paths.temp %>/css/olesnica_admin.css',
    dest: '<%= paths.dist %>/assets/css/olesnica_admin.min.css'
  }

};
