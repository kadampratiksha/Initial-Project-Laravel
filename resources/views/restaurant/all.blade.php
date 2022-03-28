@extends('layouts.admin')
@section('content')

<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form">Add Restaurant</button>
        </div>

        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Add Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{config('app.baseURL')}}/restaurant/add">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Restaurant Name</label>
                                <input type="text" class="form-control" name="restaurant_name"  placeholder="Restaurant Name" required/>
                            </div>
                            <div class="form-group">
                                <label >Restaurant Code</label>
                                <input type="text" class="form-control" name="restaurant_code" placeholder="Restaurant Code" required/>
                            </div>
                            <div class="form-group">
                                <label >Restaurant Description</label>
                                <textarea class="form-control" name="restaurant_desc" placeholder="Restaurant Desc" required/></textarea>
                            </div>
                            <div class="form-group">
                                <label >Phone No</label>
                                <input type="text" id="number" class="form-control" name="phone_no" placeholder="Ph. No." oninput="numberOnly(this.id);" onchange="this.value = '91' + this.value" class="form-control" maxlength="10" required/>

                            </div>
                            <script type="text/javascript">
                                document.getElementById("number").addEventListener('change', function(e){
                                    e.target.value = '91' + e.target.value;
                                });
                                function numberOnly(id) {
                                    var element = document.getElementById(id);
                                    element.value = element.value.replace(/[^0-9]/gi, "");
                                }
                            </script>
                            <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required/>                               
                            </div>
                            <div class="form-group">
                                <label >Restaurant Image</label>
                                <input type="file" name="restaurant_image" class="form-control" required/>
                            </div>
                            
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Update Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{config('app.baseURL')}}/restaurant/edit/">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="resto" class="resto">
                        <div class="modal-body">
                            <div class="form-group">
                                <label >Restaurant Name</label>
                                <input type="text" class="form-control name" name="restaurant_name"  placeholder="Restaurant Name" required/>
                            </div>
                            <div class="form-group">
                                <label >Restaurant Code</label>
                                <input type="text" class="form-control code" name="restaurant_code" placeholder="Restaurant Code" required/>
                            </div>
                            <div class="form-group">
                                <label >Restaurant Description</label>
                                <textarea class="form-control desc" name="restaurant_desc" placeholder="Restaurant Desc" required/></textarea>
                            </div>
                            <div class="form-group">
                                <label >Phone No</label>
                                <input type="text" id="number" class="form-control number" name="phone_no" placeholder="Ph. No." oninput="numberOnly(this.id);" onchange="this.value = '91' + this.value" class="form-control" maxlength="10" required/>

                            </div>
                            <script type="text/javascript">
                                document.getElementById("number").addEventListener('change', function(e){
                                    e.target.value = '91' + e.target.value;
                                });
                                function numberOnly(id) {
                                    var element = document.getElementById(id);
                                    element.value = element.value.replace(/[^0-9]/gi, "");
                                }
                            </script>
                            <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" class="form-control email" id="email1" aria-describedby="emailHelp" name="email" placeholder="Enter email" required/>                               
                            </div>
                            <div class="form-group">
                                <label >Restaurant Image</label>
                                <input type="file" name="restaurant_image" class="form-control" required/>
                            </div>
                            
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Restaurants </h3>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable" id="myTable" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Restarant Name</th>
                                    <th>Restarant Code</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Image</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#myTable").dataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        ajax:"{{config('app.baseURL')}}/restaurant/allData/",
        "order":[
        [0,"asc"]
        ],
        "columns":[
        {
          "mData":"restaurant_id"
        },{
            "mData":"restaurant_name"
        },{
            "mData":"restaurant_code"
        },{
            "mData":"phone_no"
        },{
            "mData":"email"
        },{
            "targets":-1,
            "mData": "resto_img.restaurant_image",
            

        },{
            "targets":-1,
            "mData": "Action",
            "bSortable": false,
            "ilter":false,
            "mRender": function(data, type, row){

                return "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#form1' value='"+row.restaurant_name+", "+row.restaurant_code+", "+row.restaurant_desc+", "+row.phone_no+", "+row.email+", "+row.restaurant_id+"'onclick='getEdit(this.value);' >Edit</button><a class=datatable-left-link href={{config('app.baseURL')}}/restaurant/delete/"+row.restaurant_id+"><span><button type='submit' class='btn btn-danger'>Delete</button></span>";

            },

        },]

    });
});

function getEdit(value){       

    const myArr = value.split(",");
    console.log(myArr);
    $(".name").val(myArr[0]);
    $(".code").val(myArr[1]);
    $(".desc").val(myArr[2]);
    $(".number").val(myArr[3]); 
    $(".email").val(myArr[4]);
    $(".resto").val(myArr[5]);     

}

$("delete").click(function(){
  $('#myTable').remove();
});
</script>
@endsection
