
<html>
<head>
    <title>Laravel 商店</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<nav class="navbar navbar-default  " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel 商店

            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/order">我的订单 <span class="fa fa-briefcase"></span></a></li>
                <li><a href="/cart">购物车 <span class="fa fa-shopping-cart"></span></a></li>
                <li><a href="/auth/login">登录</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>商品</th>
                    <th></th>
                    <th class="text-center">数量</th>
                    <th class="text-center">单价</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>

          @foreach( $carts as $cart)
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                        
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset($cart->options['size'])}}" style="width: 100px; height: 72px;"> </a>
                           
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$cart->name}}</a></h4>
                            </div>
                        </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center">{{$cart->qty}}</td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$cart->price}}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <a href="/home/shopcat/del/{{$cart->rowId}}"> <button type="button" class="btn btn-danger">
                                <span class="fa fa-remove"></span> 移除
                            </button>
                        </a>
                    </td>
                </tr>
  @endforeach


                <tr>
                    <td> </td>
                    <td><h3>总数</h3> </td>
                    <td> <h3> {{$count}} </h3>   </td>
                    <td><h3>总价</h3></td>
                    <td class="text-right"><h3><strong>${{$total}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>

                    <td>
                        <a href="/"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> 继续购物
                            </button>
                        </a></td>
                    <td>   <a href="/del"> <button type="button" class="btn  btn-danger">
                                <span class="fa fa-shopping-cart"></span> 清空购物车
                            </button>
                        </a> </td>
                    <td>
                        <button type="button" class="btn btn-success">
                            结算 <span class="fa fa-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>

</html>