<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type=submit]:hover {
            background-color: #45a049;

        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body>
    @if (isset($view_data))
      <h3>View Update Form</h3>
    @else
      <h3>View Create Form</h3>
    @endif
    <div class="container">
        @if (isset($view_data))
            <form action="{{ route('viewUpdate') }}" method="POST">
        @else
            <form action="{{ route('viewCreate') }}" method="POST">
        @endif
            @csrf
            <label for="fname">Hotel View Name</label>
            <input type="text" id="fname" name="name" value="{{ old('name',(isset($view_data))? $view_data->name : '') }}" placeholder="Hotel View name.." autofocus>
            @error('name')
                <p style="color:red;">{{ $message }}</p>
            @enderror
            @if ( isset($view_data))
                <input type="hidden" name="id" value="{{ $view_data->id }}">
            @else

            @endif
            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>
