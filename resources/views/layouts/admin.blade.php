<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')-Admin Panel</title>
    <link rel="stylesheet" href="{{asset('/admin/css/styles.css')}}">
</head>
<body>
    <div class="navbar">
        <div class="admin-controls">
            <!-- Sayt nomi -->
            <div class="site-name">Pazanda</div>
        </div>
    
        <div class="user-notification">
            <!-- Bildirishnoma ikonchasi user logoning chap tomonida -->
            <div class="notification">
                <span class="notification-icon">&#128276;</span> <!-- Bildirishnoma ikonchasi -->
                <span class="notification-badge" id="notificationBadge">0</span>
            </div>
    
            <!-- User logo chap tomonda joylashadi -->
            <img src="{{asset('/admin/img/user1.webp')}}" alt="User Logo" class="user-logo">
            
            <!-- Admin menyusi -->
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" id="adminDropdown">Admin</a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="editProfile.html">Edit Profile</a></li>
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

                    
                </ul>
            </div>
        </div>
    </div>
    
    
    

    <div class="sidebar-content">
        <div class="sidebar">
            <a href="dashboard.html">Dashboard</a>
            
            <a href="newRecipe.html">Yangi Retseptlar</a>
            <a href="addRecipe.html">Retsept Qo'shish</a>
            <a href="allRecipes.html">Umumiy Retseptlar</a>
        </div>
    
    
    @yield('content')

    </div>

<script src="{{asset('/admin/js/scripts.js')}}"></script>
</body>
</html>
