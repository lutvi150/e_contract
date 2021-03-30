<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.css')}}">
    <script src="{{asset('assets/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.js')}}"></script>
    <title>Document</title>

</head>
<body>
    <div class="container">
        <h1>Membuat fitur upload</h1>
        <form action="{{ url('upload/store') }}" enctype="multipart/form-data" method="post">
            <div class="alert alert-danger print-error-msg" style="display: none">
                <ul></ul>
            </div>
            <input type="text" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" name="judul" id="" class="form-control" placeholder="Masukan Judul" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Gambar</label>
              <input type="file" name="gambar" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm upload-image" type="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
<script >
    $("body").on("click",".upload-image",function (e) {
        $(this).parents("form").ajaxForm(opstions);
     })
     var options={
         complete:function (response) {
             if ($.isEmtyObject(response.responseJSON.error)) {
                 $("input[name='judul']").val("");
                 alert("Upload Gambar berhasil");
             } else {
                 printErrorMsg(response.responseJSON.error)
             }
          }
     }
     function printErrorMsg(params) {
         $(".print-error-msg").find("ul").html("");
         $(".print-error-msg").css('display','bloack');
         $.each(msg,function(key,value) {
             $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         })
     }
</script>
</html>
