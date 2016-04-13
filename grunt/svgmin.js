'use strict';

module.exports = {

  dist: {
    files: [
      {
        expand: true,
        cwd: 'src/Olesnica/WebBundle/Resources/public/images',
        src: ['**/*.svg'],
        dest:'<%= paths.dist %>/assets/images/'
      },
    ],
  },

};
