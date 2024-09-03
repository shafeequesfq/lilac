<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Users List</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        </div>
        <!-- Search Input -->
        <div class="form-group mb-4">
            <label for="search-input">Search</label>
            <input type="text" id="search-input" class="form-control" placeholder="Search by name, designation, or department">
        </div>

        <!-- User Cards -->
        <div class="row" id="user-cards">
            <!-- User cards will be loaded here by AJAX -->
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom AJAX Script -->
    <script>
        $(document).ready(function() {
            function fetchUsers(query = '') {
                $.ajax({
                    url: "{{ route('users.search') }}",
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#user-cards').html(data);
                    }
                });
            }

            // Fetch users on input change
            $('#search-input').on('keyup', function() {
                const query = $(this).val();
                fetchUsers(query);
            });

            // Fetch initial data
            fetchUsers();
        });
    </script>
</body>
</html>