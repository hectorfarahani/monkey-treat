## Super Plugin
**A WordPress plugin boilerplate**

## How to use?

1. Use the green **Use this template** button to create a new repository for your own.
2. Select **Repository name**, set repository privacy and leave **Include all branches** as it is **(unchecked)**.
3. Clone your repository.
4. Search and replace in **case sensitive** mode:

* Search for **`Super_Plugins`** and replace with your plugin name. This is used for namespaces. E.G: **`My_Plugin`**

* Search for **`super-plugin`** and replace with your plugin text domain. This is also used as file names, url slug, npm package name and composer package name. E.G: **`my-plugin`**

* Search for **`super_plugin`** and replace with snake case slug. This is used for db table creation, functions and variable prefix. E.G: **`my_plugin`**

* Search for **`SUPL`** and replace with your prefix. This is used as PHP constant prefix. Could be a 4 letter prefix, or full name all **uppercase**. E.G: **`MYPL`** or **`MY_PLUGIN`**

* Search for **`supl`** and replace with your prefix. This is used as prefix for files. Could be a 4 letter prefix, or full name all **kebab-case**. E.G: **`mypl`** or **`my-plugin`** (4 letter prefix is recommended)
---
### Plugin Development
* Run `composer install`
* Run `npm install`
* Run `compose dump-autoload`
* Run `gulp`

There are gulp tasks to make work easier. Check the using `gulp --tasks`

---
### Branching:
**main** is used for releases. It is safe to create your own project from **main** branch.

**develop** is used for development and it will be merged to main right before releasing a new version.
