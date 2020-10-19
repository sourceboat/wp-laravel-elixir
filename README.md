:warning: **Deprecated:** This project is not actively maintained anymore. Use it at your own risk.

# WP Laravel Elixir

[![Packagist](https://img.shields.io/packagist/v/sourceboat/wp-laravel-elixir.svg?style=flat-square)](https://packagist.org/packages/sourceboat/wp-laravel-elixir)
[![Packagist Downloads](https://img.shields.io/packagist/dt/sourceboat/wp-laravel-elixir.svg?style=flat-square)](https://packagist.org/packages/sourceboat/wp-laravel-elixir)
[![Build Status](https://img.shields.io/travis/sourceboat/wp-laravel-elixir.svg?style=flat-square)](https://travis-ci.org/sourceboat/wp-laravel-elixir)

Get versioned [Laravel Elixir](https://laravel.com/docs/5.3/elixir) file paths in WordPress.

## Installation

To use this plugin you need to setup your WordPress installation via a Composer setup like [Bedrock](https://github.com/roots/bedrock). Then you can install it via:

```
$ composer require sourceboat/wp-laravel-elixir
```

## Usage

This plugin exposes the `elixir('path/to/file.ext')` helper method, known from the [Laravel Framework](https://laravel.com/docs/5.3/elixir). It expects your files in the  `dist` directory of the active theme.

You can use the helper method like this:

```php
add_action('wp_enqueue_scripts', function () {
    wp_register_style('main-css', elixir('css/main.css'), null, null);
    wp_enqueue_style('main-css');
    
    wp_register_script('main-js', elixir('js/main.js'), null, null, true);
    wp_enqueue_script('main-js');
});
```
