<ul id="slide-out" class="side-nav">
    
    <h2 class="section">
        Admin Panel
    </h2>
        <ul class="collapsible" data-collapsible="accordion">
                <li><a href="/" class="blue-text">Home</a></li>
            <li>
                <div class="collapsible-header blue-text"><i class="mdi-navigation-arrow-drop-down"></i>Users</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/admin">View Users</a></li>
                        <li><a href="/admin/users/create">Create Users</a></li>

                    </ul>
                </div>
            </li>

            <div class="divider"></div>
            <li>
                <div class="collapsible-header blue-text"><i class="mdi-navigation-arrow-drop-down"></i>Jobs</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/admin/jobs">View jobs</a></li>
                        <li><a href="/admin/jobs/create">Create Job</a></li>
    
                    </ul>
                </div>
            </li>
            <div class="divider"></div>
            <li>
                <div class="collapsible-header blue-text"><i class="mdi-navigation-arrow-drop-down"></i>Categories</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/admin/category">View Categories</a></li>
                        <li><a href="/admin/category/create">Create Categories</a></li>
    
                    </ul>
                </div>
            </li>
            <div class="divider"></div>
            <li>
                <div class="collapsible-header blue-text"><i class="mdi-navigation-arrow-drop-down"></i>Comments</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ route('comment.index') }}">View Comments</a></li>
                       
    
                    </ul>
                </div>
            </li>

      
      </ul>

    

  </ul>
 
  <a href="#" data-activates="slide-out" class="button-collapse"><h3><i class="mdi-navigation-menu"></i></h3></a>
          