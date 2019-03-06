<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <title>Code test</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="task_area">

                <div class="panel">

                    @if(session('message'))
                        <h3 style="color: green;">
                            {{session('message')}}
                        </h3>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="desc col-12">


                    <div class="col-sm-6">
                        @foreach($tasks as $task)
                        <div class="card">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                            <div class="card-body">
                                <h5 class="card-title">Task Number: {{$task->id}}</h5>
                                <input type="hidden" name="id" value="{{$task->id}}">
                                <p class="card-text">Task Description: {{$task->descr}}</p>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                    @if(!$task->status)
                                    <div class="input-group-append">
                                        <button class="btn-primary" id="">Upload</button>
                                    </div>
                                        @endif
                                </div>
                                @if($task->status)
                                <span class="badge badge-pill badge-success">Task complete</span>
                                @endif
                            </div>
                            </form>
                        </div>
                            <br/>
                            @endforeach
                    </div>
                    {{-- End of card --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</body>
</html>