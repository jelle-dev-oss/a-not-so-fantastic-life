
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>

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
            max-width: 650px;
            margin: auto;
        }

        .header {
            background: #172b4d;
            color: white;
            padding: 22px 30px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 22px;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .form-card h2 {
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #172b4d;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        button, .back-btn {
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .submit-btn {
            background: #172b4d;
            color: white;
            border: none;
            flex: 1;
        }

        .submit-btn:hover {
            background: #243e68;
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .back-btn {
            background: #f3f0e9;
            color: #172b4d;
        }

        @media (max-width: 500px) {
            .form-card {
                padding: 22px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>Library Management System</h1>
        </div>

        <div class="form-card">

            <h2>Add New Book</h2>
            <p class="subtitle">Enter the book information below.</p>

            <form id="bookForm" action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" id="title" name="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author"
                        value="{{ old('author') }}" required>

                    @error('author')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" name="isbn"
                        value="{{ old('isbn') }}" required>

                    @error('isbn')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity"
                        value="{{ old('quantity', 1) }}" min="1" required>

                    @error('quantity')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="actions">
                    <a href="{{ route('books.index') }}" class="back-btn">
                        Cancel
                    </a>

                    <button type="submit" id="submitBtn" class="submit-btn">
                        Add Book
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('bookForm').addEventListener('submit', function () {
            const button = document.getElementById('submitBtn');

            button.disabled = true;
            button.textContent = 'Adding Book...';
        });
    </script>

</body>
</html>
