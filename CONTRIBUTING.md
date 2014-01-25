## Contribution Guide

[ TK: _Let’s build some stuff, you guys_. ]

### Getting Started

#### Cloning the Repo
[ TK: Basic instructions. ]

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

Using MAMP or Apache or what-have-you, you’ll want to create a virtualhost that points at `[…]/pattern-library/dist/`. Now you can edit files in the `tmpl` directory, and the `grunt watch` task will automatically rebuild `dist` as you go—giving you a preview of the site as it will appear in the wild, minified and concatenated assets and all.

## Reporting Issues

If you encounter a bug, please report it in the [issue tracker](https://github.com/alistapart/pattern-library/issues/new). Before opening a new issue, have a quick look to see whether a similar issue already has already been reported—if so, better to comment on that thread.

When submitting an issue, do your best to include the following:

1. Issue description
2. Steps to reproduce
3. Platform/browser (including version, if possible) and devices tested

## Feature Requests

If you have an idea for a new feature or a suggestion how to improve an existing feature, let us know! [Open a new issue](https://github.com/alistapart/pattern-library/issues/new) to describe your request.

## Pull Requests

[ TK: Intro to PRs ]

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

