<?php
/**
 * Plugin Name: WP Laravel Elixir
 * Plugin URI: https://github.com/sourceboat/wp-laravel-elixir/
 * Description: Get versioned Laravel Elixir file paths in WordPress.
 * Version: 1.0.0
 * Author: Sourceboat
 * Author URI: https://sourceboat.com/
 * License: MIT License
 */

if (! function_exists('elixir')) {
    /**
     * Get the path to a versioned Elixir file.
     *
     * @param  string  $file
     * @param  string  $buildDirectory
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    function elixir($file, $buildDirectory = 'build')
    {
        static $manifest = [];
        static $manifestPath;

        $public_path = get_stylesheet_directory() . '/dist/';
        $public_uri = get_stylesheet_directory_uri() . '/dist/';

        if (empty($manifest) || $manifestPath !== $buildDirectory) {
            $path = $public_path . $buildDirectory . '/rev-manifest.json';

            if (file_exists($path)) {
                $manifest = json_decode(file_get_contents($path), true);
                $manifestPath = $buildDirectory;
            }
        }

        if (isset($manifest[$file])) {
            return $public_uri . trim($buildDirectory . '/' . $manifest[$file], '/');
        }

        $unversioned = $public_path . $file;

        if (file_exists($unversioned)) {
            return $public_uri . trim($file, '/');
        }

        throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}
