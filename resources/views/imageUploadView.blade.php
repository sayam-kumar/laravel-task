<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (Session::has('success'))
        <span>{{ Session::get('success') }}</span>
    @endif
    <form action="{{ route('uploadImage')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="Image">Testing Image</label><br>
        <input type="file" name="imagee" id="imagee"><br>
        @if ($errors->has('imagee'))
            <span class="text-danger">{{ $errors->first('imagee') }}</span>
        @endif
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>