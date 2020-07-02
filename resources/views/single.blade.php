@extends('layouts.master')

@section('content')


 <div class="content">
        <div class="container">
          <div class="row">
           

            <div class="col-md-12">
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
                  {{$recipe->description}}
                </p>
              </div>
            </div>
            


            </div>
            
            
          </div>
          

          <div class="row">
            <div class="col-md-12">
             <div class="card text-right" dir="rtl;" >
              <div class="card-header">
        <h4 class="card-title">مواد لازم </h4>
       
      </div>
        <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-right">مواد و مقدار</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($recipe->ingredients as $ingredient)
                        <tr>
                          <td class="text-center">{{($loop->index)+1}}</td>
                          <td class="text-right">{{$ingredient->item}}</td>
                          
                        </tr>
                        @empty
                        @endforelse
                        
                      </tbody>
                    </table>
                   
                  </div>
                </div>
          </div>
        </div>
          </div>









          <div class="row">
            <div class="col-md-12">
             <div class="card text-right" dir="rtl;" >
              <div class="card-header">
        <h4 class="card-title">مراحل پخت</h4>
       
      </div>
            <div id="accordion" role="tablist">
              @forelse($recipe->steps as $step)
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     
                      {{"مرحله" }} {{($loop->index)+1}} 
                      
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                   <p class="text-center">{{$step->description}}</p>
                  </div>
                </div>
              </div>
              @empty
              @endforelse
              
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>




@endsection