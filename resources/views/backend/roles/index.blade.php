@extends('master_1')
@section("title", "All Users")

@section('content')

<div class="container row section">
    <div class="col s12 section z-depth-1">
        <div class="">
            <h3 class="section">
                <i class="fas fa-users"></i>
                All Roles
            </h3>
        </div>

        @if (!$roles->isEmpty())
            <table class="bordered highlight">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Joined At</th>
                        <th colspan="2" class="center">Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($roles as $role)
                        <tr>
                           <td>
                                <a href="#">
                                    {{ $role->name }}   
                                </a>
                            </td>                           
                            <td>{{ $role->created_at }}</td>
                            <td> 
                                <a class="btn light-blue waves-effect waves-light" href="#">Edit &nbsp; <i class="fas fa-edit"></i>
                                </a> 
                                <a class="btn red waves-effect waves-light" href="#">Delete &nbsp; <i class="fas fa-remove"></i>
                                </a>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>There are no users</p>
        @endif
        
    </div>
    <div class="row section container">
        <div class="col s12 section">
            <a class="btn red waves-effect waves-light section left" href="/admin/roles/create">Create Roles <i class="fas fa-remove"></i>
            </a>  
        </div>
    </div>
</div>

@endsection