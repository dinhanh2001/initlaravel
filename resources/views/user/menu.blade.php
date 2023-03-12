@extends('user.layout.app')
@section('title','Thực đơn | Tư vấn bữa ăn gia đình')
@section('style')
	<style>
        #data{
            text-align: center;
            width: 100%;
        }
        thead, th{
            text-align: center;
        }
        td,tr,th{
            padding: 10px;
            border: 1px solid #ddd;
        }
        #switch{
            margin:10px;
            margin-bottom: 20px;
            padding:10px;
            font-weight: 600;
            background: #0275d8;
            color:#fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
	<!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url({{asset('user/img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Tạo thực đơn</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thực đơn</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Archive Area Start ****** -->
    <section class="archive-area section_padding_80">
        <div class="container">
            <div style="clear: both"></div>
            <div>
                <h2>Thực đơn bữa nay</h2>
            </div>
            <div class="row">
                <button type="submit" id="switch" onclick="getFood()">Đổi thực đơn</button>
                <table align="center" id="data">
                    <thead>
                        <th>#</th>
                        <th>Tên thức ăn</th>
                        <th>Loại thức ăn</th>
                        <th>Số lượng</th>
                        <th>Chi hết</th>
                    </thead>
                    <tfoot>
                        <th>#</th>
                        <th>Tên thức ăn</th>
                        <th>Loại thức ăn</th>
                        <th>Số lượng</th>
                        <th>Chi hết</th>
                    </tfoot>
                    <tbody border="1px" id="menu">
                        @foreach($lstFood as $key => $food)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><a href="{{sizeof($food->recipes) > 0 ? route('user.recipe.show',$food->recipes[0]->id) : "javascript:void(0)"}} target="_blank"">{{$food->food_name}} {{sizeof($food->recipes) > 0 ? "" : "(chưa có công thức)"}}</a></td>
                                <td>{{$food->category->food_category_name}}</td>
                                <td>...</td>
                                <td>{{$food->food_price}}đ/100g</td>
                            </tr>    
                        @endforeach
                        <tr>
                            <td>Tổng</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- ****** Archive Area End ****** -->
@endsection
@section('script')
    <script>
        getFood();
        function getFood(){
            $.ajax({
                url:'{{route('user.menu.create')}}',
                type:"GET",
                success:function(resp){
                    var lstFood = resp.foods;
                    var lstWeight = resp.result;
                    var html = "";
                    var sum = 0;
                    lstFood.forEach(function(food,id){
                        var weight,price;
                        if(!!lstWeight[id]){
                            var weight = (lstWeight[id]*100).toFixed(1);
                            var price = parseInt(lstWeight[id]*food.price);   
                        }
                        sum += parseInt(price);
                        html+='<tr>'+
                                '<td>'+(id+1)+'</td>'+
                                '<td><a href="'+(!!food.recipes ? food.recipes : 'javascript:void(0)')+'">'+food.name + (!!food.recipes ? "" : " (chưa có công thức)") +'</a></td>'+
                                '<td>'+food.category+'</td>'+
                                '<td>'+(!!lstWeight[id] ? weight : "0")+'gam</td>'+
                                '<td>'+(!!lstWeight[id] ? numberWithSpaces(price) : "0")+'vnđ</td>'+
                            '</tr>'
                    });
                    html+='<tr><td>Tổng</td><td></td><td></td><td></td><td>'+numberWithSpaces(sum)+'vnđ</td></tr>';
                    $('#menu').html(html);
                },
                error:function(err){
                    alert('Có lỗi xảy ra');
                }
            });
        }
        function numberWithSpaces(x) {
            x = x.toString().split(' ').join('');
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            return parts.join(".");
        }
    </script>
@endsection