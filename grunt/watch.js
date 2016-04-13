'use strict';

module.exports = {

  styles: {
    files: [
      // Web
      'src/Olesnica/WebBundle/Resources/public/less/**/*.less',
      // Admin
      'src/Olesnica/AdminBundle/Resources/public/less/**/*.less',
    ],
    tasks: ['build-css'],
    options: {
      nospawn: true
    }
  },

  scripts: {
    files: [
      // Web
      'src/Olesnica/WebBundle/Resources/public/js/**/*.js',
      // Admin
      'src/Olesnica/AdminBundle/Resources/public/js/**/*.js',
    ],
    tasks: ['build-js'],
    options: {
      nospawn: true
    }
  }

};
