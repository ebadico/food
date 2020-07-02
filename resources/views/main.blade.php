@extends('layouts.master')

@section('content')


 <div class="content">
        <div class="container">
          <div class="row">
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