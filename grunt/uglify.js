'use strict';

module.exports = {

  web: {
    files: {
      '<%= paths.dist %>/assets/js/olesnica_web.min.js': ['<%= paths.temp %>/js/olesnica_web.js']
    }
  },

  admin: {
    files: {
      '<%= paths.dist %>/assets/js/olesnica_admin.min.js': ['<%= paths.temp %>/js/olesnica_admin.js'],
      '<%= paths.dist %>/assets/js/event.min.js': ['src/Olesnica/AdminBundle/Resources/public/js/event.js']
    }
  }

};
