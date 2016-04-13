'use strict';

module.exports = {

  dist: {
    options: {
      paths: '<%= paths.bower %>',
      compress: false,
      yicomporess: false,
      optimization: 2
    },

    files: {
      '<%= paths.temp %>/css/olesnica_web.css': 'src/Olesnica/WebBundle/Resources/public/less/main.less',
      '<%= paths.temp %>/css/olesnica_web_all.css': 'src/Olesnica/WebBundle/Resources/public/less/main_all.less',
      '<%= paths.temp %>/css/olesnica_admin.css': 'src/Olesnica/AdminBundle/Resources/public/less/main.less'
    }
  }

};
