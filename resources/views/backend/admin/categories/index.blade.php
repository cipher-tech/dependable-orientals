
@extends('master_1')
@section("title", "All Users")

@section('navbar')
@include('shared.sidenav')
@endsection

@section('content')

<div class="container row section">
    <div class="col s12 section z-depth-1">
        <div class="">
            @if (Session('status'))
                <p class="section white-text green">{{session("status")}} </p>
            @endif

            @if (Session('cannot_delete'))
                <p class="section white-text red">{{session("cannot_delete")}} </p>
            @endif

            <h3 class="section">
                <i class="fas fa-users"></i>
                ALL CATEGORIES
            </h3>
        </div>

        @if (!$categories->isEmpty())
            <table class="bordered responsive-table">
                <thead>
                    <tr> 
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr>
                           <td>
                                {{ $category->name }} 
                            </td>
                            <td> 
                               
                                <div>

                                    <form  method="POST" action="{!! action('Admin\CategoriesController@delete', $category->id) !!}">  
                                        {{ csrf_field() }}
                                        <button class="btn waves-effect waves-light red" type="submit" name="action">Delete &nbsp; <i class="fas fa-close"></i>
                                        </button>
                                    </form>
                                </div>
      
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
        @else
            <p>There are no categories</p>
        @endif
       
    </div>
   <div class="col s12 section">
    <a href="/admin/category/create" class="btn left blue lighten-2 waves-effect waves-light">Create Category</a>
   </div>
</div>

@endsection