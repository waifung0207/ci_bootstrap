## CodeIgniter Bootstrap

A website starter template that integrates CodeIgniter, Twitter Bootstrap as well as Grocery CRUD for backend content management. 

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