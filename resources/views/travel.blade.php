@extends('layouts.app')

@section('content')

 <!-- our blog -->
 <div id="blog" class="blog">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Recommended Places</h2>
                     <span>The recommendation places for you is: </span> 
                  </div>
               </div>
            </div>
            <div class="row">

            @foreach($places as $p)

               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                  <div class="blog-box">
                     <figure><img src="{{$p->image}}" alt="#"/>
                     </figure>
                     <div class="travel">
                        <span>{{$p->name}} :  Nearest to {{$p->nearest_to}}</span> 
                     </div>
                     <h3>{{$p->address}}</h3>
                     <p>{{$p->description}}...<a href="{{$p->link}}">more</a></p>
                  </div>
               </div>
            @endforeach
            </div>
         </div>
      </div>
      <!-- end our blog -->
      
@endsection