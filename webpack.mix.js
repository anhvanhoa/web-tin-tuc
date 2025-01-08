const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/bootstrap.min.js", "public/js/bootstrap.min.js")
    .js("resources/js/custom.js", "public/js/custom.js")
    .js("resources/js/jquery.min.js", "public/js/jquery.min.js")
    .js("resources/js/tether.min.js", "public/js/tether.min.js")
    // .styles(
    //     [
    //         "resources/css/bootstrap.css",
    //         "resources/css/colors.css",
    //         "resources/css/responsive.css",
    //         "resources/css/font-awesome.min.css",
    //         "resources/css/style.css",
    //         "resources/css/version/tech.css",
    //     ],
    //     "public/css/app.css"
    // );
    .postCss("resources/css/bootstrap.css", "public/css/bootstrap.css", [
        require("autoprefixer"),
    ])
    .postCss("resources/css/colors.css", "public/css/colors.css", [
        require("autoprefixer"),
    ])
    .postCss("resources/css/responsive.css", "public/css/responsive.css", [
        require("autoprefixer"),
    ])
    .postCss(
        "resources/css/font-awesome.min.css",
        "public/css/font-awesome.min.css",
        [require("autoprefixer")]
    )
    .postCss("resources/css/style.css", "public/css/style.css", [])
    .postCss("resources/css/version/tech.css", "public/css/version/tech.css", [
        require("autoprefixer"),
    ])
    .copy("resources/images", "public/images");
