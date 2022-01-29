<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP generated</title>
</head>
<body>
    Hello {{$category_name ?? ''}},

    <p>To login to website, please use below OTP</p>

   <p> {{$category_description ?? ''}}</p>
   Thanks,
   {{ env('APP.APP_NAME') }} 
</body>
</html>