<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Books</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f0e9;
            min-height: 100vh;
            padding: 40px 20px;
            color: #172b4d;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .navbar {
            background: #172b4d;
            color: white;
            padding: 20px 30px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .navbar h1 {
            font-size: 22px;
        }

        .logout-btn {
            background: #f3f0e9;
            color: #172b4d;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dcd6ca;
        }

        .content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .content h2 {
            margin-bottom: 8px;
            font-size: 25px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #172b4d;
            color: white;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #e8e8e8;
        }

        tbody tr:hover {
            background: #f8f6f1;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 25px;
        }

        .footer {
            text-align: center;
            color: #888;
            margin-top: 25px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px;
            }

            .navbar h1 {
                font-size: 17px;
            }

            .content {
                padding: 20px 15px;
            }
        }

        .add-book-btn {
            background: #172b4d;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }

        .add-book-btn:hover {
            background: #243e68;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Navigation Bar -->
        <div class="navbar">
            <h1>Library Management System</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="content">

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">

                <div>
                    <h2>List of Books</h2>
                    <p class="subtitle">View all available books in the library.</p>
                </div>

                <a href="{{ route('books.create') }}" class="add-book-btn">
                    + Add Book
                </a>

            </div>
            
            @if (session('success'))
                <div style="background: #e6f4ea; color: #216e39; padding: 12px 15px; border-radius: 6px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    No books found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <div class="footer">
            Library Management System &copy; {{ date('Y') }}
        </div>

    </div>

</body>
</html>
