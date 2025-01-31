<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newtrition</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Link to your CSS file -->
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('meal-log.index') }}">Meal Log</a></li>
                <li><a href="{{ route('goals.index') }}">Goals</a></li>
                <li><a href="{{ route('profile.show') }}">Profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        @yield('content') <!-- This is where content from individual views will be injected -->
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Newtrition. All rights reserved.</p>
    </footer>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>
</html>
