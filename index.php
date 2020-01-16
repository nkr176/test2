<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container">
        <br>
            <div class="col-md-6 card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="datalist" class="col-sm-2 col-form-label">List : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="datalist" value="9,1,6,2,4,10,8,7,5,3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="search" class="col-sm-2 col-form-label">ค้นหา : </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="search">
                        </div>
                        <div class="col-sm-2">
                            <button type="buttion" id="btn_search" class="btn btn-warning">ค้นหา</button>
                        </div>
                    </div>
                    <center> ประเภทการค้นหา </center>
                    <select id="search_type" class="form-control">
                        <option value="1">Linear Search</option>
                        <option value="2">Binary Search</option>
                        <option value="3">Bumble Search</option>
                    </select>
                    <br>
                    <p>ผลลัพธ์</p>
                    <div class="card">
                        <div class="card-body">
                            <center>
                            <p id="result_search"></p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
<script>
$("#btn_search").click(function(){
    var datalist = $("#datalist").val();
    var search = $("#search").val();
    var search_type = $("#search_type").val();

    $.ajax({
        url : 'search.php',
        type : 'post',
        data : { datalist: datalist,
                 search : search,
                 search_type : search_type },
        success : function(data){
            $("#result_search").html(data);
        }
    });

});

</script>

