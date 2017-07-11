<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>找回密码</title>
</head>
<body>
    亲爱的{{$user->name}},请点击 <a href="http://www.clc.com/reset?id={{$user->id}}&token={{$user->token}}">重置按钮</a>，重置您的密码！
</body>
</html>