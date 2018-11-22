<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Homepag, mainpage">
    <meta name="author" content="">
    <title>Welcome - www.website.com</title>
    @extends('includes.css')
    @extends('includes.js')
  </head>

    <body>
      @yield('content')
      @yield('scripts')
    </body>

</html>
