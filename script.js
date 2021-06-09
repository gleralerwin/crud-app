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
                // document.querySelector("table").style.backgroundColor = "green";
                $('').css();
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
    $('#editmodal').modal();

    $.ajax({
        url:'ajax.php',
        type:'post',
        dataType:'json',
        data:{
            id:id,
            function:'getById'
        },
        success: function(data)
        {
            // console.log(data);
            $('#editmodal').attr('data-user-id', data[0]['id']);
            $('#edit-fname').val(data[0]['fname']); 
            $('#edit-lname').val(data[0]['lname']);
            $('#edit-address').val(data[0]['address']);
            $('#edit-gender').val(data[0]['gender']);
          
        }
    });
}

//save update
function saveUpdate()
{
    var id = $('#editmodal').attr('data-user-id');
    var fname = $('#edit-fname').val();
    var lname = $('#edit-lname').val();
    var address = $('#edit-address').val();
    var gender = $('#edit-gender').val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'text',
        data:{
            id:id,
            fname:fname,
            lname:lname,
            address:address,
            gender:gender,
            function: 'insertUpdate'
        },
        success: function(data) {
            // console.log(data);
            alert('Update Succesfully');
            fetch();
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
            $('#totalUser').empty();
            $('#totalUser').html(data);
        }
    });
}

//view modal
function viewModal(id)
{
    $('#viewmodal').modal();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        dataType: 'json',
        data:{function: 'getview', id:id},
        success: function(data)
        {
            console.log(data);
            $('#viewmodal').attr('data-user-id', data[0]['id']);
            $('#view-fname').val(data[0]['fname']);
            $('#view-lname').val(data[0]['lname']);
            $('#view-address').val(data[0]['address']);
            $('#view-gender').val(data[0]['gender']);
        }
    });
}
viewModal();


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

function getJsonFile()
{
    $.get('./data.json', function(data, status) {
        console.log(data[0]['fname']);
    });
}
getJsonFile();

///////////////////////////////////////////////////////////////////////////////////

// function getApiData()
// {
//     $.ajax({
//         url: 'https://jsonplaceholder.typicode.com/users',
//         success: function(data){
//             console.log(data);

//             var student = '';

//             $.each(data, function(key, value){
//                 student += '<tr>';
//                 student += '<td>' + value.name + '</td>';
//                 student += '<td>' + value.username + '</td>';
//                 student += '<td>' + value.email + '</td>';
//                 student += '<td>' + value.address.city + '</td>';
//                 student += '</tr>';
//             });
//             $('#data-api').append(student);
//         }
//     });

// }

// function loadData()
// {
//     $.ajax({
//         url: 'server_processing.php',
//         type: 'post',
//         dataType: 'json',
//         processing: true,
//         serverSide: true,
//         success: function(data){
//             console.log(data);
//             $('#display').dataTable();
//         }
//     });
// }