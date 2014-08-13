
#### v 0.4 (Date: 2014-08-14)

- **Frontend**
	- Use Bootswatch theme instead of original Bootstrap styling
	- Basic workflow and layout for user Login / Sign Up / Activate / Logout
	- Basic workflow for Forgot Password / Reset Password
	- Show different menu for visitors, or login users
	- Includes some helpers (e.g. email, form validation) which come from Backend System

#### v 0.3 (Date: 2014-08-11)
- **Backend**
	- Linked with MySQL database for backend user login (table name: "")
	- Added sql folder with MySQL data structure
	- 2 preset backend users from .sql file: login as "admin/admin" (role = admin), or "staff/staff" (role = staff)
	- Login as different roles will now show different themes
	- Removed custom constants from config/constants.php
	- Login users can now update info and change password from Account page
	- Backend users (admin role) can reset password of other backend users
	- Added config/form_validation.php file and helpers/MY_form_helper.php for quick validation coding via rule sets
	- Added MY_html_helper.php for generating AdminLTE widgets
	- Moved CRUD library loading to crud_helper
	- Included "assets/dist" in current repository for quick project setup (when no asset customization is required)

#### v 0.2.2 (Date: 2014-08-06)
- **Backend**
	- Added email config file (Mailgun example)
	- Added email helper with overrided send_mail() function
	- Added views/email folder to store email templates

#### v 0.2.1 (Date: 2014-08-02)
- **Backend**
	- Switch to jquery legacy version for better Grocery Crud support
	- Added alert helper to work with setting / showing alert box more easily

#### v 0.2.0 (Date: 2014-04-15)
- **Backend**
	- Add AdminLTE theme for backend system
	- Update overall file structure, and Login / Home page layout to adopt AdminLTE theme
	- Enable theme switch by changing DEFAULT_THEME value in backend/constants.php, or $this->mTheme value in controllers
	- Add "Profile" page with Account Info and Change Password widgets (layout only)
	- Remove sidebar_left layout because that is no longer necessary when using AdminLTE theme
- **General**
	- Update Gruntfile.coffee for loading AdminLTE assets
	- Update Gruntfile.coffee for livereload when update is made on the file itself
	- Detect site domain to switch ENVIRONMENT value (i.e. development / production)

#### v 0.1.0
- **General**
	- Add bower for third-party package management
	- Add grunt for asset pipeline management
	- Add changelog.txt for logging feature updates / bug fixes
	- Remove Bootswatch themes because they should be managed via bower instead of the repository itself

#### v 0.0.1
- **General**
	- Basic frontend / backend structure
	- Preset layout for different pages
	- Add GroceryCRUD for handling backend opertations