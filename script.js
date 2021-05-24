//fetch
function fetch()
{
    $.ajax({
        url: "ajax.php",
        type: "post",
        dataType: "text",
        data: {function: 'fetchUser'},
        success: function(data){
            // console.log(data);
            $('#displaylist').empty();
            $('#displaylist').append(data);
        }
    });
} 

//adduser modal
function addUserModal()
{
    $('#addModal').modal();
}   
 
//add user
function saveUser()
{
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var gender = $('#gender').val();

    if(fname != "" && lname != "" && address != "" && gender != "")
    {
        $.ajax({
            url: 'ajax.php',
            type: 'post',
            dataType: 'text',
            data: {
                fname:fname,
                lname:lname,
                address:address,
                gender:gender,
                function: 'saveUser'
            },
            success: function(data)
            {
                // console.log(data);
                alert("Added Successfully");
                fetch();
            }
        });
    } 
    else {
        alert("All Fields are required");
    }
}

//editmodal
function editModal(id)
{
    $('#editModal').modal();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data: {
            id:id,
            function: 'getById'
        },
        success: function(data)
        {
            // console.log(data);
           
            $('#editModal').attr('data-user-id', data[0]['id']);
            $('#edit-fname').val(data[0]['fname']); 
            $('#edit-lname').val(data[0]['lname']);
            $('#edit-address').val(data[0]['address']);
            $('#edit-gender').val(data[0]['gender']);
        }
    });
}

//display number of user
function showTotalUser()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data: {function: 'countRow'},
        success: function(data)
        {
            // console.log(data);
            $('#displayUser').empty();
            $('#displayUser').html('<button type="button" class="btn btn-primary">Users <span class="badge">'+data+'</span></button>');
        }

    });
}

//delete
function deleteUser(id)
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            id:id,    
            function: 'deleteId'},
        success: function(data){
            // console.log(data);
            alert('are you sure');
            fetch();
        }
    });
}

///////////////////////////////////////////////////////////////////////////////////

function getApiData()
{
    $.ajax({
        url: 'https://jsonplaceholder.typicode.com/users',
        success: function(data){
            console.log(data);

            var student = '';

            $.each(data, function(key, value){
                student += '<tr>';
                student += '<td>' + value.name + '</td>';
                student += '<td>' + value.username + '</td>';
                student += '<td>' + value.email + '</td>';
                student += '<td>' + value.address.city + '</td>';
                student += '</tr>';
            });
            $('#data-api').append(student);
        }
    });

}

function loadData()
{
    $.ajax({
        url: './server_processing.php',
        type: 'post',
        dataType: 'json',
        processing: true,
        serverSide: true,
        success: function(data){
            console.log(data);
            $('#display').DataTable(data);
        }
    });

   
}