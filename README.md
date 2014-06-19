## CodeIgniter Bootstrap

A website starter template that integrates [CodeIgniter](http://ellislab.com/codeigniter), [Bootstrap](http://getbootstrap.com/) as well as [Grocery CRUD](http://www.grocerycrud.com/) & [Image CRUD](http://www.grocerycrud.com/image-crud) for backend content management. 

### Pre-requisites

You need to pre-install the following tools before building the template:

* [node.js](http://nodejs.org/): which includes a package manager (npm) for node modules
* [bower](http://bower.io/): package manager for bower components (to handle third-party assets)
* [grunt](http://gruntjs.com/): task runner for lots of purposes, e.g. compile, combine and minify scripts


### Installation

Inside the terminal, change to directory where you cloned the repository.

1. Update bower.json (optional) then call bower to download third-party packages: ```bower install```
2. Update package.json (optional) then install grunt packages: ```npm install```
3. Update Gruntfile.coffee (optional, which is written in CoffeeScript), then use grunt command to start preset tasks: ```grunt```
4. After all you will find the post-processed files under the **"assets/dist"** folder, means you have successfully configured it :)


### Usage

After above installation, you should be able to visit the websites via links like these:

* **Frontend** website: http://localhost/ci_bootstrap/
* **Backend** website: http://localhost/ci_bootstrap/backend.php

Whereas the backend website will require login (username and password: admin) before accessing the inner pages.


### Screenshots

Website screenshots can be checked from [screenshots folder](https://github.com/waifung0207/ci_bootstrap/tree/master/screenshots) under this repository.
