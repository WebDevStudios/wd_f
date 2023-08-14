# wd_f <!-- omit in toc -->

[![Build Status](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fwebdevstudios%2Fwd_f%2Fbadge%3Fref%3Dmain&style=flat)](https://github.com/WebDevStudios/wd_f/actions)

The WebDev FSE Starter Block Theme

[![WebDevStudios. Your Success is Our Mission.](https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png)](https://webdevstudios.com/contact/)

## Table of Contents <!-- omit in toc -->

- [Introduction](#introduction)
- [Getting Started](#getting-started)
	- [Prerequisites](#prerequisites)
	- [Quick Start](#quick-start)
- [Setup](#setup)
	- [Development](#development)
	- [Building a block with wpcli](#building-a-block-with-wpcli)
- [Contributing and Support](#contributing-and-support)

## Introduction

`wd_f`, also known as `WebDev FSE` or `funderscores`, is an exciting and experimental sister theme of [wd_s](https://github.com/WebDevStudios/wd_s), specifically designed for those ready to dive into the world of full site editing. This cutting-edge theme is meant for hacking and exploration, allowing you to unleash your creativity and transform it into the next incredible WordPress theme.

As a starter block theme, `wd_f` provides a solid foundation for your WordPress journey. However, it is important to note that it is not intended to be used as a Parent Theme. Instead, it is the perfect canvas for you to customize, modify, and shape into the most awesome WordPress theme you can imagine.

I feature some of the web's most proven technologies like: [Tailwind](https://www.tailwindcss.com), [npm](https://www.npmjs.com/), [webpack](https://webpack.js.org/), [Sass](http://sass-lang.com/), and [PostCSS](https://github.com/postcss/postcss). To help you write clean code (that meets [WordPress standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/)), we tap into [@wordpress/scripts](https://developer.wordpress.org/block-editor/packages/packages-scripts/) for linting CSS and JavaScript. Did I mention that I'm also accessible? Yup. I pass both WCAG 2.1AA and Section 508 standards out of the box.

So, whether you're an experienced developer or a curious beginner, `wd_f` welcomes you to push the boundaries and create something extraordinary. With its flexible nature and compatibility with full site editing features, you have the power to transform every aspect of your website, from headers and footers to content layouts and beyond.

Unleash your creativity, experiment with different blocks, and take advantage of the vast possibilities offered by full site editing. `wd_f` is here to support and inspire you as you embark on your WordPress adventure. Let your imagination run wild and turn `wd_f` into the next remarkable WordPress theme that will leave a lasting impression on the web.

## Getting Started

### Prerequisites

Because I compile and bundle assets via NPM scripts, basic knowledge of the command line and the following dependencies are required:

- [Node](https://nodejs.org) (v18+)
- [NPM](https://npmjs.com) (v8+)
- [Composer](https://getcomposer.org/)

### Quick Start

If you want to set me up manually:

1. [Clone](https://github.com/WebDevStudios/wd_f) into your `wp-content/themes` directory and rename `wd_f` to fit your needs.

2. Find & Replace

You'll need to change all instances of the name: `wd_f`.

- Search for: `@package wd_f` and replace with: `@package project_name` to capture the package name
- Update `"WebDevStudios\wd_f,wd_f"` to: `"CompanyName\project_name,project_name"` (with double quotes) in phpcs.xml.dist
- Search for: `WebDevStudios\wd_f` and replace with: `CompanyName\project_name` to capture the namespaces
- Update `"WebDevStudios\wd_f,wd_f,wds"` to `"CompanyName\project_name,project_name,wds"` (with double quotes) in phpcs.xml.dist
- Update `"webdevstudios/wd_f"` to `"companyname/project_name"` (with double quotes) in composer.json
- Search for: `, 'wd_f'` and replace with: `, 'project_name'` (inside backticks) to capture the text domain
- Update `Text Domain: wd_f` to: `Text Domain: project_name` in style.css
- Update `"wd_f"` to: `"project_name"` (with double quotes) in phpcs.xml.dist and package.json
- Update `'wd_f'` to: `'project_name'` (with single quotes) in inc/setup/setup.php
- Search for: `wd_f_` and replace with: `project_name_` to capture all the function names
- Search for: `'wd_f-` and replace with: `'project_name-` to capture prefixed handles
- Search for `wd_f.pot` and replace with: `project_name.pot` to capture translation files
- Search for `webdevfse.test` and replace with: `project_name.test` to match your local development URL
- Edit the theme information in the header of style.scss to meet your needs

## Setup

From the command line, change directories to your new theme directory:

```bash
cd /wp-content/themes/your-theme
```

Install theme dependencies and trigger an initial build.

>Note: You will need to have Composer and NPM 8 installed first.

```bash
npm i
```

### Development

From the command line, type any of the following to perform an action:

Command | Action
:- | :-
`npm run watch` | Builds assets and starts Live Reload and Browsersync servers
`npm run start` | Builds assets and starts Live Reload server
`npm run build` | Builds production-ready assets for a deployment
`npm run lint` | Check all CSS, JS, MD, and PHP files for errors
`npm run format` | Fix all CSS, JS, MD, and PHP formatting errors automatically
`npm run report` | Gives detailed information on coding standards violations in PHP code

### Building a block with wpcli

In order to build a block, run the following wpcli script.

Note: If you're using Local, you can open the shell from within Local to do this. `Sitename -> Open site shell`.

```bash
wp wds create_portable_block myblock --title="This is myblock" --desc="This block is used for wds." --keyword="myblock" --icon="table-row-before" --namespace="wds"
```

This will scaffold out a block inside of the `blocks` folder in the theme. Replace `myblock` with the name of your block and update the other items `title`, `desc`, `keyword`, `icon`, `namespace` with the appropriate information.

Note: If you don't see your new block available under the block listing in the editor after following the above steps, try changing the namespacing in your block's `block.json` to the following format `your-namespace/blockname` and check again.

## Contributing and Support

Your contributions and [support tickets](https://github.com/WebDevStudios/wd_f/issues) are welcome. Please see our [contributing guidelines](https://github.com/WebDevStudios/wd_f/blob/main/CONTRIBUTING.md) before submitting a pull request.

wd_f is free software, and is released under the terms of the GNU General Public License version 2 or any later version. See [LICENSE.md](https://github.com/WebDevStudios/wd_f/blob/main/LICENSE.md) for complete license.
