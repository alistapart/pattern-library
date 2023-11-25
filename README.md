pattern-library
===============

The [ALA Pattern Library](http://patterns.alistapart.com/).

## Contribution Guide

_Let’s build stuff, you guys_.

### Getting Started

#### Running the Project

We're using Node.js, NPM (_Node Package Manager_), and Grunt.js to manage the code in this repo. To preview code locally, you'll need to [install Node and NPM](http://nodejs.org/), then run the following commands from a terminal window, in the repo directory:

``` bash
$ npm install
$ grunt
```
Those commands do the following:

- `npm install` will install the necessary node.js packages to develop on this project
- `grunt` will run a series of tasks defined in `gruntfile.js`, such as concatenating or minifying CSS and JavaScript, and copying relevant production files to the `dist` directory.

Once run, you can preview the site by pointing a web server at the `dist` directory (see below).

We have set up a `watch` task to automatically rebuild the `dist` files whenever files are changed. When you start working, just run the following commands to run all tasks and then start the watch task:

``` bash
$ grunt && grunt watch
```

#### Setting up Your Dev Environment

`grunt && grunt watch` to setup watching on the source in `_tmpl`.  To view the examples fire up the
simple development webserver (using `expressjs`) on `localhost:3000` with:

```bash
$ node app.js
```

Or, if you plan on hacking on the devserver views (`index.ejs` or `patchwork.ejs`) or the devserver itself run it
with `nodemon` for automatic restarting on changes.

```bash
$ nodemon app.js
```

Now you can edit files in the `tmpl` directory, and the `grunt watch` task will automatically rebuild `dist` as you go—giving you a preview of the site as it will appear in the wild, minified and concatenated assets and all.

To view your the pattern library in your browser you can just hit `localhost:3000` in your web browser.

#### Deployment

The included `PHP` application in `_tmpl` will work quite nicely if you'd like to push this out to an `Apache` server somewhere.  In time, the simple `app.js` server may be extended as a another viable option for deployment but for now it is strictly useful for allowing folks to quickly get started viewing and hacking on the patterns without `Apache`.

#### Adding Patterns

All patterns are separate HTML files that live in /patterns. Ideally, the file name should be the same as the pattern's main class name. Add a file to see it in the library.

If you'd like to add usage notes to a pattern, add a .txt file with the same name as the .html file and it'll get pulled into the right place.

## Reporting Issues

If you encounter a bug, please report it in the [issue tracker](https://github.com/alistapart/pattern-library/issues/new). Before opening a new issue, have a quick look to see whether a similar issue already has already been reported—if so, better to comment on that thread.

When submitting an issue, do your best to include the following:

1. Issue description
2. Steps to reproduce
3. Platform/browser (including version, if possible) and devices tested

## Feature Requests

If you have an idea for a new feature or a suggestion how to improve an existing feature, let us know! [Open a new issue](https://github.com/alistapart/pattern-library/issues/new) to describe your request.

### Submitting

When submitting a pull request for review there are a few important steps you can take to ensure that it gets reviewed quickly and increase the chances that it will be merged (in order of descending importance):

1. Try to limit the scope to one issue or feature
2. Small focused commits, ideally less than 10 to 20 lines
3. Avoid merge commits (see the section on “rebasing” below)
4. Use descriptive commit messages

### Rebasing

Often times when working on a feature or bug fix branch it's useful to pull in the latest from the parent branch. If you're doing this _before_ submitting a pull request it's best to use git's rebase to apply your commits onto the latest from the parent branch. For example, working on `new-feature` branch where `upstream` is the remote at `git@github.com:alistapart/pattern-library.git`:

``` bash
git checkout new-feature
git pull --rebase upstream master
## You may have to resolve some conflicts here.
```

You can now push to your own fork to both update it and add your commit(s), then submit your pull request. Keep in mind that it’s only a good idea to do this if you _haven't_ already submitted a pull request, unless you want to create a new one. Have a look at <cite>Pro Git</cite>’s [chapter on rebasing](http://git-scm.com/book/ch3-6.html) to learn more.
