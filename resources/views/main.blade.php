@extends('layouts.master')

@section('content')


 <div class="content">
        <div class="container">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://ghazaland.com/wp-content/uploads/2019/04/slider-shish-kabab-new.jpg" rel="nofollow" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://kalleh.com/book/wp-content/uploads/sites/2/2017/11/Untitled-1_1-2.jpg" rel="nofollow" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://chishi.ir/wp-content/uploads/2020/05/kabab-koubide.jpg" rel="nofollow" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons">search</i>
                </span>
              </div>
              <form method="GET" action="{{route('home')}}">
              <input type="text" name="search" class="form-control" placeholder="جستجوی غذا">
              </form>
            </div>
          </div>
          <div class="row">
           @forelse($recipes as $recipe)

            <div class="col-md-3">
             <div class="card card-blog">
              <div class="card-header card-header-image">
                <a href="{{route('recipe.single',$recipe->id)}}">
                   @if ($recipe->photo)<img src="{{url($recipe->photo)}}" alt="...">
                        @else<img src="{{asset('assets/image_placeholder.jpg')}}" alt="...">@endif
                  <div class="card-title">
                    {{$recipe->name}}
                  </div>
                </a>
              </div>
              <div class="card-body">
                <!-- <h6 class="card-category text-info">Fashion</h6> -->
                <p class="card-description">
                  {{Str::limit($recipe->description,$limit = 80,$end="...")}}
                </p>
              </div>
            </div>
            
            


            </div>
            @empty
            @endforelse
            
          </div>
          {{ $recipes->links() }}
        </div>
      </div>




@endsection