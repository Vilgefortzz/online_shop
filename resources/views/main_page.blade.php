@extends('layouts.app')

@section('content')
    <div class="container text-center">
        {{--Welcome image - logo, idea of shop etc.--}}
        <div class="jumbotron">
            <h1><img src="/images/icons/brand_logo.png" width="90" height="90">{{config('app.name')}}</h1>
            <div class="small">
                <ul class="list-unstyled">
                    <li>
                        Own way, own path to create and provide you the best equipment
                    </li>
                    <li>
                        The best prices and quality confirmed by our satisfied customers
                    </li>
                </ul>
            </div>
        </div>

        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

        {{--Categories bar menu--}}
        <ul class="horizontal_menu">
            @foreach($categories as $category)
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"><h3><b>{{$category->name}}</b></h3></a>
                    <ul class="dropdown-menu expose">
                        @foreach($category->subcategories as $subcategory)
                            <li><a href="{{ url('/subcategories/'.$subcategory->id.'/products') }}"><b>{{$subcategory->name}}</b></a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

    </div>

    {{--Deals, promotions etc.--}}
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1" class="active"></li>
            <li data-target="#carousel" data-slide-to="2" class="active"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/images/sales_promotions_deals/deal_1.png">
            </div>
            <div class="item">
                <img src="/images/sales_promotions_deals/deal_2.png">
            </div>
            <div class="item">
                <img src="/images/sales_promotions_deals/promotion_1.png">
            </div>
        </div>
    </div>

    {{--List of all recommended products--}}
    <div class="container">
        {{--Horizontal line--}}
        <div class="horizontal_line"></div>

        {{--Header!!--}}
        <h1 class="text-center bigger_header" style="margin-bottom: 50px"><span class="glyphicon glyphicon-thumbs-up"></span><b>Recommended products</b></h1>

        <div id="products" class="row list-group">

            @foreach($recommendedProducts as $recommendedProduct)

                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="/images/{{$recommendedProduct->image}}" width="200" height="200"/>
                        <div class="caption">
                            <h2 class="group inner list-group-item-heading">
                                <b>
                                    {{$recommendedProduct->name}}
                                    <a href="#" style="font-size: 18px">
                                        <span class="glyphicon glyphicon-triangle-right"></span>See details
                                    </a>
                                </b>
                            </h2>

                            <div class="row" style="margin-top: 50px">
                                <div class="col-xs-12 col-md-4">
                                    <p><b>Buy now:</b></p>
                                    <p class="lead_main"><b>${{$recommendedProduct->price}}</b></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a id="{{$recommendedProduct->id}}" class="btn btn-success add_to_cart" href="{{ url('/cart/add/'.$recommendedProduct->id) }}">
                                        <span class="glyphicon glyphicon-shopping-cart"></span>Add to cart
                                    </a>
                                    {{--For autheniticated users--}}
                                    @if(Auth::check())
                                        <a class="btn btn-warning" href="#" style="margin-top: 3px">
                                            <span class="glyphicon glyphicon-comment"></span>Give a review
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="overlay"></div>

    <script src="{{ asset('js/focus_and_dim.js') }}"></script>

    {{-- AJAX scripts--}}

    <script src="{{ asset('js/add_to_cart_ajax.js') }}"></script>
    <script src="{{ asset('js/delete_from_cart_ajax.js') }}"></script>

@endsection