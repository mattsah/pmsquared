# PM² is a Package Manager for Package Managers

As web developers, we understand the uses of a good package manager.  Things like Composer and Bower have redefined our workflow and ensured we no longer again have to worry about using our version control systems as ways to ensure we can easily access specific versions of our code.  Never will our children have to worry about how on earth they will ensure their projects can cross-link and recursively pull from specific versions of their dependencies!

Unfortunately, the number of available package managers has skyrocketed.  Enter PM².

**Please Note**

PM² is early beta software, some functionality such as installing and updating package managers may not work right away.

## FAQ

### The documentation and command output say PM² with a capital 'P', and 'M', why isn't the command capitalized?

We recognize that typing capital letters requires extra work for keyboardists.  We wanted to keep the command as simple to type as possible for speed.

### How can I mark my package manager as being dependent on another package manager?

You can't currently, but we plan to add this functionality down the line.  For now we recommend the maintainers of project managers use git submodules.