@extends('admin.master')

@section('title','Category Page')

@section('content')
   <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="margin-top:20px;">
   <br><br>
   <h3 style="text-decoration:underline">
       List Categories
    </h3><br>
   
   <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>

            </tr>
        </thead> 
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td class="active">{{ $category->name }}</td>
                </tr>
            @empty
                <td colspan="2" align="center"> No Category </td>
            @endforelse  
        </tbody>   
      </table>
   </div>

    <br><br>
     <form action="{{route('admin.category.store')}}" method="POST" role="form">
          {{ csrf_field() }}
          <div class="form-group">
             <label for="name">Category Name:</label>
             <input type="text" class="form-control" name="name" id="name" placeholder="Category name">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
     </form> 

   </main>
@endsection 