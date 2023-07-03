# Laravel TestIDs

Laravel TestIDs is a Composer package that provides a custom Artisan command to add a `data-testid` attribute to `<a>` and `<input>` tags in Laravel Blade files. This package simplifies the process of adding unique identifiers to elements for automation testing purposes.

## Installation

You can install the package via Composer by running the following command in your Laravel project's root directory:

```bash
composer require your-vendor/laravel-testids


## Usage

Once the package is installed, you can run the following Artisan command to add the data-testid attribute to <a> and <input> tags in your Blade files:

```bash
php artisan testids:add
