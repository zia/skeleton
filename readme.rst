####################
CodeIgniter Skeleton
####################

1. Download the zip File or clone the repo.
2. Rename the project if you wish.
3. Run 'composer install' command in the root folder (CLI) (Install composer from here: http://getcomposer.org)
4. Run 'migrate up' command in the root folder (CLI)
5. Check the app is working on the browser or not.
6. Check your databse(if xampp installed go to http://localhost/phpmyadmin/).Ther should be a db named 'sample_db' and a table named 'users' inside it.
7. Go to 'your_app_name/user' in the browser.you'll find login prompt.
8. Use username=admin password=admin to login.
9. Configure your facebook/google api key to login with facebook/google (Get your facebook/google api-key from here)
10. Test your app in phpunit

**To add image,css and js file put them into 'app_root_folder/assets/img or css or js' folder respectively. To invoke (in view)
	- image file: <img src="<?=img_file('image.jpg')?>" alt="Smiley face" height="42" width="42"> [If your images are in subfolder just put their name infornt of filename like 'sub_folder/image.jpg']
	- css file: <link href="<?=css_file('sidebar')?>" rel="stylesheet">
	- js file: <script src="<?=js_file('jquery-1.11.2.min')?>"></script>

**You can customize the utility_helper if you need to put the html tags also loaded from the helper.

**To generate crud go to 'your_app_name/harviacode' in the browser. select table name from dropdown, choose features, generate crud application.

**To migrate (generate,create and migrateall)

**Translate

**HMVC (https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/downloads/)
--> important for hmvc [https://stackoverflow.com/questions/41557760/codeigniter-hmvc-object-to-array-error]
**REST

Links:
https://github.com/liaan/codeigniter_migration_base_generation
https://www.youtube.com/watch?v=i07XXM37VFk
https://bitbucket.org/harviacode/codeigniter-crud-generator
https://snippetrepo.com/snippets/script-tag-for-codeigniter



###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community IRC <https://webchat.freenode.net/?channels=%23codeigniter>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
