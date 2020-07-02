@extends('layouts.app')

@section('content')


 <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">fastfood</i>
                  </div>
                  <h4 class="card-title text-right">دستورهای پخت</h4>
                  <a href="{{route('recipes.create')}}" type="button" class="btn btn-success float-right">افزودن</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-right">نام غذا</th>
                          <th class="text-right">حذف و ویرایش</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($recipes as $recipe)
                        <tr>
                          <td class="text-center">{{$recipe->id}}</td>
                          <td class="text-right">{{$recipe->name}}</td>
                          <td class="td-actions text-right">
                           
                            <a href="{{route('recipes.edit',$recipe->id)}}" type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a>
                          <!--   <a type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </a> -->


                            <form method="POST" action="{{ route('recipes.destroy',$recipe->id)  }}">
                              @method('DELETE')
                              @csrf
                              
                              <button type="submit" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </button>
                          </form>
                          </td>
                        </tr>
                        @empty
                        @endforelse
                        
                      </tbody>
                    </table>
                    <!-- pagination -->
                    <!-- <nav aria-label="Page navigation example">
                    	<ul class="pagination justify-content-center">
                    		<li class="page-item disabled">
                    			<a class="page-link" href="javascript:;" tabindex="-1">Previous</a>
                    		</li>
                    		<li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                    		<li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                    		<li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                    		<li class="page-item">
                    			<a class="page-link" href="javascript:;">Next</a>
                    		</li>
                    	</ul>
                    </nav> -->
                    {{ $recipes->links() }}

                    <!-- end of pagination-->
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>




@endsection