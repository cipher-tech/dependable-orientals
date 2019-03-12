
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
                All Users
            </h3>
        </div>

        @if (!$users->isEmpty())
            <table class="bordered responsive-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Sex</th>
                        <th>Applied For</th>
                        <th>Address</th>
                        <th>Joined At</th>
                        <th colspan="2" class="center">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                           <td>
                                {{ $user->name }} 
                            </td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->sex }}</td>
                            <td> {{  ($user->jobs()->pluck('name')) ?  $user->jobs()->pluck('name') : '' }} </td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td> 
                                <a class="btn light-blue waves-effect waves-light" href="{{ action('Admin\UsersController@edit', $user->id) }}">Edit &nbsp; <i class="fas fa-edit"></i>
                                </a> 
                            </td>
                            <td>
                                <form action="{{ action('Admin\UsersController@delete', $user->id) }}" method="POST"> 
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
   <div class="col s12 section">
    <a href="/admin/users/create" class="btn left blue lighten-2 waves-effect waves-light">Create user</a>
   </div>

   <div class="col s12 m4 offset-m4">
        {{ $users->links() }}
   </div>
</div>


@endsection