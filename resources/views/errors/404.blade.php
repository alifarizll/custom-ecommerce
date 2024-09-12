<!doctype html>
<html lang="en">
<head>
  <title>Page Not Found</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <style>
    /* Add some basic styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
    }
    
    /* Style the header */
    h1 {
      font-size: 36px;
      color: #333;
      margin-top: 50px;
    }
    
    /* Style the paragraph */
    p {
      font-size: 18px;
      color: #666;
      margin-bottom: 50px;
    }
    
    /* Add a background image */
    body {
      background-image: linear-gradient(to bottom, skyblue, #e6e6e6);
    }
    
    /* Add some box shadow to the text */
    h1, p {
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    /* Add a call-to-action button */
    .cta {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    .cta:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <h1>Oops! The Page you're looking for isn't here.</h1>
  <p>Maybe the page was moved or deleted, or perhaps you just typed the wrong address. Why not try a search, or start from the homepage? </p>
  <a href="{{url('/')}}" class="cta">GO BACK</a>
</body>
</html>