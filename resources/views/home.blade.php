@extends('layouts.app')

@section('content')

    <section >
        <div class="banner-main">
            <img src="images/banner.jpg" alt="#"/>
            
            <div class="container">
               <div class="text-bg">
                  <h1><strong class="white">Find your flight</strong></h1>
                    <form action="/search/flights" method="post">
                        @csrf
                        <h4><strong class="white">From: </strong><input type="text" name="from" required>
                        <strong class="white">To: </strong><input type="text" name="to" required>
                        <div class="button_section"> <button class="main_bt" type="submit" href="#">Search</button>  </div>
                        <!-- <button type="submit">search</button> -->
                    </h4>
                    </form>
                
                </div>
            </div>
        </div>
           
    </section>

@endsection
