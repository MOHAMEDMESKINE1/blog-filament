<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!-- styling -->  
    @include('layouts.links')
    @yield('link')
    <!-- styling -->
</head>
<body>

    <!-- loader -->
    <x-loader></x-loader>
    <!-- loader -->
    
     <!-- Header -->
     @include('layouts.navbar')
     <!-- Header -->
      
     
     
    <!-- content -->
     @yield('content')
    <!-- content -->

    <!-- footer -->   
    @include('layouts.footer')
    <!-- footer -->

    <!-- scripts -->
    @include('layouts.scripts')
    <!-- scripts -->


    @yield('script')

     <script language = "text/Javascript"> 
       cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
       function clearField(t){                   //declaring the array outside of the
       if(! cleared[t.id]){                      // function makes it static and global
           cleared[t.id] = 1;  // you could use true and false, but that's more typing
           t.value='';         // with more chance of typos
           t.style.color='#fff';
           }
       }
     </script>
</body>
</html>