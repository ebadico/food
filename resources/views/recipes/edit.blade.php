@extends('layouts.app')

@section('content')


<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">menu_book</i>
            </div>
            <h4 class="card-title text-right">ویرایش دستور پخت
              <small class="category"></small>
            </h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('recipes.update',$recipe->id)}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <!-- <label class="bmd-label-floating">نام غذا</label> -->
                    <h4 class="title text-right">نام غذا</h4>

                    <input type="text" name="name" class="form-control" value="{{$recipe->name}}" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <!-- <label>توضیحات غذا</label> -->
                    <h4 class="title text-right">توضیحات غذا</h4>
                    <div class="form-group">
                      <label class="bmd-label-floating"> توضیحات غذا را اینجا وارد  نمایید</label>
                      <textarea name="description" class="form-control" rows="5" required>
                        {{$recipe->description}}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                   <div class="col-md-4 col-sm-4">
                    <h4 class="title text-right">تصویر غذا</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        @if ($recipe->photo)<img src="{{url($recipe->photo)}}" alt="...">
                        @else<img src="{{asset('assets/image_placeholder.jpg')}}" alt="...">@endif
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail">
                      </div>
                      <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="photo"  />
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>





           
            <div class="clearfix"></div>
         
        </div>
      </div>


      <!-- start of box 2 -->
      <div class="card">
        <div class="card-header card-header-icon card-header-rose">
          <div class="card-icon">
            <i class="material-icons">menu_book</i>
          </div>
          <h4 class="card-title text-right">مواد لازم
            <small class="category"></small>
          </h4>
        </div>
        <div class="card-body">
          <form>



           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <!-- <label class="bmd-label-floating">مواد لازم</label> -->
                @php
                  $x = 0;
                @endphp
                @forelse ($recipe->ingredients as $ingredient)
                <input type="text" name="item[]" value="{{$ingredient->item}}" class="form-control" placeholder="تخم مرغ سه عدد ">
                <br>
                @php $x = $loop->count @endphp
                @empty

                @endforelse
                
                


                @for ($x ; $x < 10; $x++)
                <input type="text" name="item[]" class="form-control" placeholder="تخم مرغ سه عدد ">
                <br>
                @endfor
                
                
              </div>
            </div>
          </div>






          <div class="clearfix"></div>
       
      </div>
    </div>  
    <!-- end of box 2 -->

          <!-- start of box 3 -->
      <div class="card">
        <div class="card-header card-header-icon card-header-rose">
          <div class="card-icon">
            <i class="material-icons">menu_book</i>
          </div>
          <h4 class="card-title text-right">مراحل پخت
            <small class="category"></small>
          </h4>
        </div>
        <div class="card-body">
          <form>



        <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label>مراحل پخت</label> -->
                  <div class="form-group">
                    <!-- <label class="bmd-label-floating"> مراحل پخت را اینجا  وارد کنید</label> -->
                    @php
                    $x = 0;
                    @endphp
                    @forelse ($recipe->steps as $step)
                    <textarea name="step[]" class="form-control" rows="5">
                      {{$step->description}}
                    </textarea><br>
                    @php $x = $loop->count @endphp
                    @empty

                    @endforelse


                    @for ($x ; $x < 10; $x++)
                    <textarea name="step[]" class="form-control" rows="5"></textarea><br>
                    @endfor


                    
                    

                  </div>
                </div>
              </div>
            </div>






          <button type="submit" class="btn btn-rose pull-right">ذخیره</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>  
    <!-- end of box 3 -->


  </div>

</div>
</div>
</div>



@endsection