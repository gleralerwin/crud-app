<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BASIC CRUD IN PHP</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
	
<div class="jumbotron text-center">
  <h2>CREATE, READ, UPDATE AND DELETE</h2>
</div>

<div class="container">
<div id="displayUser" style="margin: 10px;"></div>
  <div class="row">
    <div class="col-sm-12">

    <!-- Edit modal with a button -->
    <button type="button" class="btn btn-primary btn-md" onclick="addUserModal()"><span class="glyphicon glyphicon-plus"></span> Add User</button>
      <h3 style="padding-top: 20px;">Userlist</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Gender</th>
            <th colspan="4">Actions</th>
          </tr>
        </thead>
        <tbody id="displaylist"></tbody>
      </table>

    </div>
    <div class="col-sm-6">
      <h3>Pending User</h3>
     
    </div>
  </div>
</div>


<script src="./script.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<!-- Add Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Details</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
        <label>First Name : </label> 
        <input type="text" id="fname" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Last Name : </label> 
        <input type="text" id="lname" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Address : </label> 
        <input type="text" id="address" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Gender</label>
        <select id="gender" class="form-control">
        <option></option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        </select>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-md btn-primary" data-dismiss="modal" onclick="saveUser();">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Edit Modal -->
<div id="editModal" class="modal fade"  data-id="" role="dialog">
  <div class="modal-dialog">

    <!-- Edit Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Details</h4>
      </div>
      <div class="modal-body">

      <div class="form-group">
        <label>First Name : </label> 
        <input type="text" id="edit-fname" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Last Name : </label> 
        <input type="text" id="edit-lname" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Address : </label> 
        <input type="text" id="edit-address" class="form-control"> 
        </div>

        <div class="form-group">
        <label>Gender</label>
        <select id="edit-gender" class="form-control">
        <option></option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

$(function(){
  fetch();
  showTotalUser();
});

</script>