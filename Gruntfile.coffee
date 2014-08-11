
module.exports = (grunt) ->
  
  # Package
  # =======
  pkg = require './package.json'

  # Variables
  # =======
  dir_app = 'applications/'
  dir_js = 'assets/js/'
  dir_css = 'assets/styles/'
  dir_sass = 'assets/styles/'
  dir_img = 'assets/images/'
  dir_dist = 'assets/dist/'
  dir_bower = 'bower_components/'


  # Configuration
  # =============
  grunt.initConfig

    # Package
    # -------
    pkg: pkg

    # Clean
    # --------------------
    clean: [
      dir_dist + '**'
    ]

    # Copy
    # --------------------
    copy:
      # copy:fonts
      fonts:
        files: [
          expand: true
          cwd: dir_bower
          src: [
            'AdminLTE/fonts/**'
          ]
          dest: "assets/fonts/"
          flatten: true
          filter: 'isFile'
        ]
      # copy:scripts
      scripts:
        files: [
          expand: true
          cwd: dir_bower
          src: [
            'jquery/dist/jquery.min.js'
            'jquery-migrate/jquery-migrate.min.js'
            #'jquery-legacy/jquery.min.js'
            #'jquery-legacy/jquery.migrate.min.js'
          ]
          dest: dir_dist
          flatten: true
          filter: 'isFile'
        ]

    # Minify - scripts
    # --------------------
    uglify:
      # uglify:frontend
      frontend:
        files:
          "assets/dist/app.min.js" : [
            # bower files
            #dir_bower + 'jquery/dist/jquery.min.js'
            #dir_bower + 'jquery-migrate/jquery-migrate.min.js'
            dir_bower + 'jquery-legacy/jquery.min.js'
            dir_bower + 'bootstrap/dist/js/bootstrap.min.js'
            # (optional) custom files
            #dir_js + 'base.js'
          ]
      # uglify:backend
      backend:
        files:
          "assets/dist/backend.min.js" : [
            # bower files
            dir_bower + 'jquery-legacy/jquery.min.js'
            dir_bower + 'jquery-legacy/jquery-migrate.min.js'
            dir_bower + 'AdminLTE/js/bootstrap.min.js'
            dir_bower + 'AdminLTE/js/jquery-ui-1.10.3.min.js'
            # (optional) custom files
            dir_js + 'backend.js'
          ]

    # Minify - css
    # --------------------
    cssmin:
      # cssmin:frontend
      frontend:
        files: 
          'assets/dist/app.min.css': [
            # bower files
            dir_bower + 'bootstrap/dist/css/bootstrap.min.css'
            dir_bower + 'font-awesome/css/font-awesome.min.css'
            # (optional) custom files
            #dir_css + 'base.css'
          ]
      # cssmin:backend
      backend:
        files: 
          'assets/dist/backend.min.css': [
            # AdminLTE theme
            dir_bower + 'AdminLTE/css/bootstrap.min.css'
            dir_bower + 'AdminLTE/css/font-awesome.min.css'
            dir_bower + 'AdminLTE/css/AdminLTE.css'

            # (optional) AdminLTE theme plugins
            #dir_bower + 'AdminLTE/css/ionicons.min.css'
            #dir_bower + 'AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
            # (optional) custom files
            dir_css + 'backend.css'
          ]

    # Optimize images
    # --------------------
    imagemin:
      # imagemin:frontend
      frontend:
        options:
          optimizationLevel: 3
          progressive: true
        files: [
          expand: true
          cwd: dir_img
          src: ['**/*.{png,jpg,gif}']
          dest: dir_dist + 'images/'
        ]

    # Watch
    # --------------------
    watch: 

      # options
      options:
        livereload: true
        spawn: false
        debounceDelay: 250

      # watch:scripts
      scripts:
        files: [dir_js + '*.js']
        tasks: ['uglify']

      # watch:css
      css:
        files: [dir_css + '*.css']
        tasks: ['cssmin']

      # watch:images
      images: 
        files: [dir_img + '**/*.{png,jpg,gif}', dir_img + '*.{png,jpg,gif}']
        tasks: ['imagemin']

      # watch:grunt 
      grunt:
        files: ['Gruntfile.coffee']
        tasks: ['build']

      # watch:other (only for livereload)
      other:
        files: [dir_app + '**/*.{html,php}']
        tasks: []

  # Dependencies
  # ============
  for name of pkg.devDependencies when name.substring(0, 6) is 'grunt-'
    grunt.loadNpmTasks name

  # Build only
  # -------
  grunt.registerTask 'build', [
    'clean'
    'copy'
    'uglify'
    'cssmin'
    'imagemin'
  ]

  # Default
  # -------
  grunt.registerTask 'default', [
    'build'
    'watch'
  ]