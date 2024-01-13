<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap-grid.min.css" integrity="sha512-ZuRTqfQ3jNAKvJskDAU/hxbX1w25g41bANOVd1Co6GahIe2XjM6uVZ9dh0Nt3KFCOA061amfF2VeL60aJXdwwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- styling -->  
    @include('layouts.links')

    @yield('link')
    <!-- styling -->
    @stack("links")
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
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
    @stack('scripts')
    <!-- footer -->   
    @include('layouts.footer')
    <!-- footer -->

    <!-- scripts -->
   

    @include('layouts.scripts')
    <!-- scripts -->

    {{-- @yield('script')

     <script language = "text/Javascript"> 
       cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
       function clearField(t){                   //declaring the array outside of the
       if(! cleared[t.id]){                      // function makes it static and global
           cleared[t.id] = 1;  // you could use true and false, but that's more typing
           t.value='';         // with more chance of typos
           t.style.color='#fff';
           }
       }
     </script> --}}

    
</body>
</html>