@extends('master_1')
@section("title", "All Users")

@section('navbar')
@include('shared.sidenav')
@endsection

@section('content')
<div class="container row section" style="width:90%">
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
                All Comments
            </h3>
        </div>

        @if (!$comments->isEmpty())
            <table class="bordered responsive-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Comment</th>
                        <th colspan="2" class="center">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                           <td>
                                {{ $comment->users_id }} 
                            </td>
                            <td>{{ $comment->comment }}</td>
                            
                            <td> {{  ($comment->users()->pluck('name')) ?  $comment->users()->pluck('email') : '' }} </td>
                        
                            <td>
                                <form action="{{ action('Admin\CommentController@destroy', $comment->id) }}" method="POST"> 
                                    {{ csrf_field() }}
                                    <button class="btn waves-effect waves-light red" type="submit" name="action">Delete &nbsp; <i class="fas fa-close"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
        @else
            <p>There are no users</p>
        @endif
       
    </div>

   <div class="col s12 m4 offset-m4">
        {{ $comments->links() }}
   </div>
</div>

@endsection