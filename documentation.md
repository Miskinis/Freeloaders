# Freeloaders documentation

### About

"Freeloaders" a responsive website for reading and posting offers from freelancers, made as an educational project for "Vytauto Didžojo Universitetas" a.k.a VDU.

### Sitemap

- Homepage
    - Job category page
        - Category subcategory page
            - Subcategory posts page
                - Post page
- Login page
    - User dashboard page
        - Create new post
        - Show all posts
            - Create new post
            - Delete post
            - Edit post
            - Show post
                - Edit post
                - Delete post
- Register Page
    - Dashboard page
    
### Database

##### Default Configuration
- Connection: mysql
- Host: 127.0.0.1
- Port: 3306
- Database name: freeloaders
- Username: root
- Password: root

Configuration file is located in project root directory, named as ".env", but if it does not exist then default configuration are used from [config](config) directory.

##### Database tables

- Tables Model
    - ![Database Model Image](documentation/images/database_image.PNG)

* All tables and their relationships are defined in php code files stored at [database/migrations](database/migrations) directory.
* All rows that were used in testing are defined in php code files stored at [database/seed](database/seeds) directory.

### Project Structure

##### Front-end

- All web pages that are displayed to the end user are stored in [resources/views](resources/views) directory.
- All custom-made and local imported scripts are stored in [public/js](public/js) directory. The [app.js](public/js/app.js) script contain all script assets that were imported by [npm](https://www.npmjs.com/).
- All custom-made and local imported stylesheets are stored in [public/css](public/css) directory. The [app.js](public/css/app.css) script contain all stylesheet assets that were imported by [npm](https://www.npmjs.com/).
- All images used be the website are stored in [public/images](public/images) directory.
- All custom-made fonts are stored in [public/fonts](public/fonts) directory, local imported in [vendor](public/fonts/vendor).

##### Back-end

- ##### Models
    The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.
    
    Models are stored in [app](app) directory and follow a strict naming convention. A model should be in singular, no spacing between words, and capitalised.
    - Good examples: User (\App\User or \App\Models\User, etc), ForumThread, Comment.
    - Bad examples: Users, ForumPosts, blogpost, blog_post, Blog_posts.
    
- ##### Controllers
    Instead of defining all of your request handling logic as Closures in route files, you may wish to organize this behavior using Controller classes. Controllers can group related request handling logic into a single class.
    
    Controllers are stored in the [app/Http/Controllers](app/Http/Controllers) directory and follow a strict naming convention.
    First character uppercase followed by the word "Controller". Ex. "PostController".
    
    In addition, for normal CRUD operations, they should use one of the following method names.
    
    Verb | URI | Typical Method Name | Route Name
    --- | --- | --- | ---
    GET | /photos	index() | photos.index
    GET | /photos/create | create() | photos.create
    POST | /photos | store() | photos.store
    GET | /photos/{photo} | show() | photos.show
    GET | /photos/{photo}/edit | edit() | photos.edit
    PUT/PATCH | /photos/{photo} | update() | photos.update
    DELETE | /photos/{photo} | destroy() | photos.destroy
    

### Tools and Technologies

The following tools and technologies were used in the process of making this project.
- [Laravel](https://laravel.com/), a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
- [Bootstrap](https://getbootstrap.com/), the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.
- [Composer](https://getcomposer.org/), a dependency manager for PHP.
- [Npm](https://www.npmjs.com/), the world's largest Software Registry. The registry contains over 800,000 code packages. Open-source developers use npm to share software.
- [Font Awesome](https://fontawesome.com/), the web's most popular icon set and toolkit.
- [PhpStorm](https://www.jetbrains.com/phpstorm/), is perfect for working with Symfony, Laravel, Drupal, WordPress, Zend Framework, Magento, Joomla!, CakePHP, Yii, and other frameworks
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper), generates helper files that enable your IDE to provide accurate autocompletion. Generation is done based on the files in your project, so they are always up-to-date.
- [Laravel Inverse Seed Generator](https://github.com/orangehill/iseed), is a Laravel package that provides a method to generate a new seed file based on data from the existing database table.
- [HTML Purifier for Laravel](https://github.com/mewebstudio/Purifier), a tools used to clean html code before sending it to database.
- [WYSIWYG editor](https://www.tiny.cloud/), a tool to easily implement WYSIWYG editing in web pages.







