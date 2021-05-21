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

//add user modal
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
                console.log(data);
                alert("Added Successfully");
                fetch();
                
            }
        });
    } 
    else {
        alert("All Fields are required");
    }
}

function editModal(id)
{
    $('#editModal').modal();
    $('#editModal').attr('data-id', id);

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
            console.log(data);
            $('#edit-fname').val(data[0]['fname']);
            $('#edit-lname').val(data[0]['lname']);
            $('#display').append(data);

        }
    });
}

//edit modal
function saveUser()
{
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data: {
            id:id,
            function: 'getById'
        },
        success: function(data){
            // console.log(data);
        }
    });
}
