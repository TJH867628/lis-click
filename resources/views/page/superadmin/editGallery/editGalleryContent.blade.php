<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact Us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            table{
                margin: auto;
            }

            table th{
                background-color: aquamarine;
            }

            #img{
                width: 30%;
                height: 20%;
            }

            img{
                width: 50%;
                height: 20%;
            }

            table tr td{
                color: black;
                text-align: center;
                padding: 3%;
                border: 1px solid black;
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100" style="background-color: white; text-align:center;">
        <form method="post" action="{{ route('uploadNewPost') }}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>Please Upload Image(only accept jpeg or png)</td>
                    <td>
                        <input type="file" name="image" accept="image/jpeg, image/png">
                    </td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input type="text" name="description">
                    </td>
                </tr>
                <!-- <tr>
                    <td>Visibility</td>
                    <td>
                        <select name="visible" id="visible">
                            <option value="true">True</option>
                            <option value="false">False</option>
                        </select>
                    </td>
                </tr> -->
                <tr>
                    <td colspan="2">
                        <button>Submit Change</button>
                    </td>
                </tr>
            </table>
        </form>    
        
        @if($gallery->isNotEmpty())
        <br><br><br><br><br><br>
        <h1 style="color: black;">GALLERY LIST</h1>
            <table border>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Visibility</th>
                <th>Update At</th>
                @foreach($gallery as $gallery)
                <tr>
                    <td id="img">
                        <img src="{{ $gallery->imageSrc }}">
                        <form method="post" action="{{ route('editExistingPost',['id' => $gallery->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" accept="image/jpeg, image/png">
                            <button>Submit New Image</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{ route('editExistingPost',['id' => $gallery->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" value="{{ $gallery->title }}">
                            <button>Submit New Title</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{ route('editExistingPost',['id' => $gallery->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="description" value="{{ $gallery->description }}">
                            <button>Submit New Description</button>
                        </form>
                    </td>
                    @if($gallery->visible == 1)
                        <td><a href="{{ route('changeVisible', ['id' => $gallery->id]) }}" class="btn btn-primary mb-4">Deactive Visible</a></td>
                    @else
                        <td><a href="{{ route('changeVisible', ['id' => $gallery->id]) }}" class="btn btn-primary mb-4">Active Visible</a></td>
                    @endif
                    <td>
                        {{ $gallery->updated_at }}
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        @else
            <h2 style="color:black;">Gallery Is Empty</h2>
        @endif
    </body>
</html>
