<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="theme.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Worker Dashboard</h1>

        <!-- Create Post Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Create New Post</h5>
            </div>
            <div class="card-body">
                <form id="createPostForm" action="create_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="postImage" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="postImage" name="post_image" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <!-- Categories will be dynamically populated from the database -->
                            <option value="1">Jackets</option>
                            <option value="2">Shoes</option>
                            <option value="1">shirts</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>

        <!-- Display Posts -->
        <div class="card">
            <div class="card-header">
                <h5>All Posts</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="postsTable">
                        <!-- Posts will be dynamically populated from the database -->
                        <tr>
                            <td>1</td>
                            <td><img src="img/trial4.jpg" alt="Post Image" width="100"></td>
                            <td>jackets</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="scripts.js"></script>
</body>
</html>