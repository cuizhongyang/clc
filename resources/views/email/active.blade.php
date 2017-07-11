<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户激活</title>
</head>
<body>
    亲爱的{{$user->name}},请点击 <a href="http://www.clc.com/active?id={{$user->id}}&token={{$user->token}}">点此激活！</a>，激活您的账号！
</body>
</html>