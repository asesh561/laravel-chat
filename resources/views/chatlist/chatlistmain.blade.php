<style>
    .close{
    padding: 0px;
    font-size: 20px;
    background: none;
    border: none;
    }

    .contact-info {
    display: flex;
    align-items: center;
}
.department {
    font-size: 12px; /* Adjust the size as needed */
    color: #666; /* Optional: Change the color */
    margin-top: 2px; /* Optional: Add spacing */
}

.profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 10px; /* Space between the image and text */
}

.contact-details {
    display: flex;
    flex-direction: column;
}

.name {
    font-weight: bold;
}

.phone {
    font-size: 0.9em;
    color: #555;
}

 </style>

<style>
.chat-list .profile-only {
    text-align: center;
}

.chat-list.profile-only .flex-grow-1.ms-3 {
    display: none;
}

.chat-list.profile-only .flex-shrink-0 {
    margin: 0 auto;
}

.chat-list.profile-only img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin: 10px auto;
}


.message-area {
    position: relative;
    width: 100%;
    transition: all 0.3s ease;
}

.chatlist {
    transition: all 0.3s ease;
    position: relative;
    left: 0;
    height: 100%;
}

/* Collapsed state */
.chatlist.collapsed {
    width: 80px;
    /* position: absolute; */
    right: 0;
    background: #fff;
    height: 100%;
}

/* Header specific styles for collapsed state */
.chatlist.collapsed .chat-header {
    padding: 10px 5px;
    width: 80px;
}

.chatlist.collapsed .chat-header .msg-search {
    width: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 5px;
}

.chatlist.collapsed .chat-header .msg-search input {
    width: 30px;
    padding: 5px;
    transition: all 0.3s ease;
}

.chatlist.collapsed .chat-header .moreoption {
    margin: 0;
    padding: 0;
}

.chatlist.collapsed .chat-header .moreoption .navbar {
    padding: 0;
}

/* Hide dropdown menu items in collapsed state */
.chatlist.collapsed .chat-header .moreoption .dropdown-menu {
    display: none;
}

/* Only show user icon in collapsed state */
.chatlist.collapsed .chat-header .moreoption li:not(:last-child) {
    display: none;
}

.chatlist.collapsed .chat-header .nav-tabs {
    display: none;
}

/* Content adjustments for collapsed state */
.chatlist.collapsed .flex-grow-1.ms-3 {
    display: none;
}

.chatlist.collapsed .flex-shrink-0 {
    margin: 0 auto;
    text-align: center;
}

.chatlist.collapsed .flex-shrink-0 img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 5px auto;
}

/* Modal body adjustments */
.chatlist.collapsed .modal-dialog-scrollable {
    height: 100%;
}

.chatlist.collapsed .modal-content {
    height: 100%;
}

/* Original layout preservation */
.modal-dialog-scrollable {
    height: 100%;
}

.modal-content {
    height: 100%;
}

/* Smooth transitions for search bar */
.chat-header .msg-search input {
    transition: all 0.3s ease;
    width: 100%;
}

/* Ensure icons stay visible in collapsed state */
.chatlist.collapsed .fa-user {
    font-size: 16px;
    padding: 5px;
}
</style>

<style>
.chat-preview-image {
    width: 20px;
    height: 20px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 10px;
}

.message-preview {
    display: flex;
    align-items: center;
}

.message-text {
    color: #666;
    font-size: 0.9em;
    display: flex;
    align-items: center;
}

.file-icon {
    font-size: 1.2em;
    margin-right: 8px;
}

.message-type-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 4px;
    margin-right: 10px;
    background-color: #f0f2f5;
}

.chat-preview-image {
    width: 20px;
    height: 20px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 10px;
}

.message-preview {
    display: flex;
    align-items: center;
}

.message-text {
    color: #666;
    font-size: 0.9em;
    display: flex;
    align-items: center;
}

.file-icon {
    font-size: 1.2em;
    margin-right: 8px;
}

.message-type-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 4px;
    margin-right: 10px;
    background-color: #f0f2f5;
}

    .msg-search {
    position: relative;
}

.search-results-container {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 0 0 8px 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-height: 350px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
}

.search-result-item {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-result-item:hover {
    background-color: #f8f9fa;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.search-result-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.user-name {
    font-weight: 600;
    color: #2c3e50;
}

.timestamp {
    font-size: 0.8em;
    color: #7f8c8d;
}

.message-preview {
    color: #34495e;
    font-size: 0.9em;
    line-height: 1.4;
}

.highlight {
    background-color: #fff3cd;
    padding: 0 2px;
    border-radius: 2px;
}

.attachment-indicator {
    margin-top: 4px;
    color: #7f8c8d;
}

.no-results {
    padding: 20px;
    text-align: center;
    color: #7f8c8d;
}

/* Scrollbar styling */
.search-results-container::-webkit-scrollbar {
    width: 6px;
}

.search-results-container::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.search-results-container::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.search-results-container::-webkit-scrollbar-thumb:hover {
    background: #555;
}
.contact {
    padding: 10px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.3s;
}

.contact:hover {
    background-color: #f5f5f5;
}

.contact-info {
    display: flex;
    align-items: center;
}

.profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 15px;
}

.contact-details {
    flex-grow: 1;
}

.contact-details .name {
    font-weight: bold;
    margin-bottom: 2px;
}

.contact-details .phone {
    color: #666;
    margin: 0;
    font-size: 0.9em;
}

#searchBar {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-bottom: 10px;
}
</style>

 <section class="message-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area">
                        <!-- chatlist -->
                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                <div style="display: flex; align-items: center;">
    <img
        class="img-fluid"
        src="{{asset('assets/img/userimg.png')}}"
        alt="user img"
        style="cursor: pointer; margin-right: 10px;">
    <span>@php echo session()->get('chat_name'); @endphp</span>(<span>@php echo session()->get('emp_id'); @endphp</span>)

</div>


                                        <div class="msg-search">
                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" aria-label="search">
                                            <div>
                                                <ul class="moreoption">
                                                    <li class="navbar nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                        <ul class="dropdown-menu">


                                                            <li data-toggle="modal" data-target="#myModal"><a class="dropdown-item" onclick="datamodel('prof')">Profile Update</a></li>
                                                            <li data-toggle="modal" data-target="#myModal1"><a class="dropdown-item" onclick="datamodel('newcon')">New Contact</a></li>
                                                            <li data-toggle="modal" data-target="#myModal2"><a class="dropdown-item" href="#">New Group</a></li>
                                                            <li data-toggle="modal" data-target="#myModal3"><a class="dropdown-item" href="#">Self Saved</a></li>
                                                            <li data-toggle="modal" data-target="#myModal3"><a class="dropdown-item" onclick="chatcreationbot()">Bot</a></li>

                                                            <li data-toggle="modal" data-target="#myModal4"><a class="dropdown-item" href="{{route('logout')}}">Log Out</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="toggleChatView()">
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation" onclick="checklist('chat')">
                                                <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Chats</button>
                                            </li>
                                            <li class="nav-item" role="presentation" onclick="checklist('group')">
                                                <button class="nav-link" id="Closed-tab" data-bs-toggle="tab" data-bs-target="#Closed" type="button" role="tab" aria-controls="Closed" aria-selected="false">Groups</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="modal-body">
                                        <!-- chat-list -->
                                        <div class="chat-lists">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                    <!-- chat-list -->
 <div class="chat-list" id="chatlist">
                                                    @foreach($messages as $msg)
    <a class="d-flex align-items-center" onclick="chatcreation({{$msg['chat_id']}},'{{$msg['chatname']}}','{{$msg['empid1']}}','{{$msg['empid2']}}')">
        <div class="flex-shrink-0">
            <img class="img-fluid" src="{{asset('assets/img/userimg.png')}}" alt="user img" style="cursor:pointer;">
            <span class="active"></span>
        </div>
        <div class="flex-grow-1 ms-3">
        <h3 style="cursor: pointer;">
                {{$msg['chatname']}}
                <span style="display: none;">{{$msg['empid2']}}</span>
                <span>({{$msg['Department']}})</span>
            </h3>

            <div class="message-preview">
                @if(isset($msg['preview_type']))
                    @if($msg['preview_type'] === 'image')
                        <img src="{{ $msg['file_path'] }}" alt="Preview" class="chat-preview-image">
                    @endif
                @endif
                <p class="message-text" style="cursor:pointer;">
                    {{ $msg['des'] }}
                </p>
            </div>
        </div>
    </a>
    @endforeach
</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  </div>
 <!-- The Modal newcon-->
 <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center" id="mhead">New Contact</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="mbody">
                <div class="container">
                    <div class="row">
                        <input type="text" id="searchBar" class="form-control" placeholder="Search by Name or Number">
                    </div>
                    <div class="row mt-3">
                        <div id="userList" class="col-md-12">
                            <!-- Contacts will be dynamically loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                        <!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="text-center" id="mhead">User Profile</h3>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body" id="mbody">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form id="userForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <div class="image-circle" style="position: relative;">
                        @if($userdata->imgpath=='')<img id="profileImage" src="{{asset('assets/img/userimgm.png')}}" alt="Profile" class="rounded-circle" style="width: 150px; height: 150px;">@else
                        <img id="profileImage" src="{{asset('assets/img/profiles/'.$userdata->imgpath)}}" alt="Profile" class="rounded-circle" style="width: 150px; height: 150px;">@endif
                        <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;" onchange="updateImage(event)">
                        <button type="button" onclick="document.getElementById('imageInput').click();" class="btn btn-primary" style="position: absolute; bottom: 10px; left: 65%; transform: translateX(-50%);border:none;background: none;color: black;"><i class="fa fa-camera" aria-hidden="true"></i></button>
                    </div>
                </div>

                <div class="form-group row">
            <label for="fullName" class="col-sm-5 col-form-label">Full Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="fullName" name="fullName" value='{{$userdata->fullname}}'>
            </div>
        </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-5 col-form-label">Username</label>
                     <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" Placeholder="@name"  value='{{$userdata->name}}' required readonly><input type="hidden" name="userid" value='{{$userdata->id}}'></div>
                </div>

                <div class="form-group row">
                    <label for="number" class="col-sm-5 col-form-label">Phone Number</label>
                     <div class="col-sm-6">
                    <input type="text" class="form-control" id="number" name="number"  value='{{$userdata->number}}' required>
                </div></div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-5 col-form-label">Date of Birth</label>
                     <div class="col-sm-6">
                    <input type="date" class="form-control" id="dob" name="dob" value='{{$userdata->dob}}'>
                </div></div>

                <div class="form-group row">
                    <label for="gender" class="col-sm-5 col-form-label">Gender</label>
                     <div class="col-sm-6">
                    <select class="form-control" id="gender" name="gender" value='{{$userdata->gender}}'>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div></div>

                <div class="form-group row">
                    <label for="country" class="col-sm-5 col-form-label">Country</label>
                     <div class="col-sm-6">
                    <input type="text" class="form-control" id="country" name="country" placeholder="India" value='{{$userdata->country}}'>
                </div></div>
                <div class="form-group row justify-content-center mt-4">
                <button type="submit" class="btn btn-success btn-block col-sm-5">Save</button>
</div>
            </form>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center" id="mhead">Create New Group</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="mbody">
                <div class="container">
                    <div class="row">
                    <input type="text" id="searchBargroup" class="form-control"  disabled style="border: none; background-color: transparent; outline: none;">



                        <input type="text" id="searchBargroupx" class="form-control" placeholder="Search by Name or Department" oninput = "loadAllUsers();">

                        <input type="hidden" id="searchBargroupwithid" class="form-control" placeholder="Search by Name or Number">
                    </div>
                    <div class="row mt-3">
                        <div id="userListgroup" class="col-md-12">
                            <!-- Contacts will be dynamically loaded here -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button id="createGroupBtn" class="btn btn-primary">Create Group</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  <script>
    function toggleChatView() {
    const chatlist = document.querySelector('.chatlist');
    chatlist.classList.toggle('collapsed');

    // Save state to localStorage
    const isCollapsed = chatlist.classList.contains('collapsed');
    localStorage.setItem('chatlistCollapsed', isCollapsed);
}

// Restore state on page load
document.addEventListener('DOMContentLoaded', () => {
    const chatlist = document.querySelector('.chatlist');
    const isCollapsed = localStorage.getItem('chatlistCollapsed') === 'true';

    if (isCollapsed) {
        chatlist.classList.add('collapsed');
    }
});
  </script>
                        <script>
function checklist(data) {
    var datachecklist = '';

    if (data === "chat") {

    $.ajax({
        url: '/pppp',
        method: 'GET',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            let datachecklist = ''; // Ensure datachecklist is defined
            let messages = response.messages; // Access messages array
console.log(messages);
            messages.forEach(msg => {
                datachecklist += `
                    <a class="d-flex align-items-center"
                        onclick="chatcreation(${msg.chat_id}, '${msg.chatname}', '${msg.empid1}', '${msg.empid2}')">
                        <div class="flex-shrink-0">
                            <img class="img-fluid" src="{{asset('assets/img/userimg.png')}}" alt="user img" style="cursor:pointer;">
                            <span class="active"></span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 style="cursor: pointer;">
                                ${msg.chatname}
                                <span style="display: none;">${msg.empid2}</span>
                                <span>(${msg.Department})</span>
                            </h3>
                            <p style="cursor:pointer;">${msg.des}</p>
                        </div>
                    </a>`;
            });

            // Append the generated chat list to a container in your HTML
            $('#chatlist').html(datachecklist);
        }
    });
}



                if (data === "group") {

                    @foreach($gmessages as $msg)
                    datachecklist += `<a class="d-flex align-items-center" onclick="gchatcreation({{ $msg['chat_id'] }}, '{{ $msg['chatname'] }}', '{{ $msg['username'] }}', {{ $msg['member_count'] }}, '{{ $msg['members'] }}')">
                        <div class="flex-shrink-0">
                            <img class="img-fluid" src="{{ asset('assets/img/userimg.png') }}" alt="user img" style="cursor:pointer;">
                            <span class="active"></span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3 style="cursor:pointer;">{{ $msg['chatname'] }}</h3>
                            <p class="message-text" style="cursor:pointer;">
                                {{ $msg['des'] }}
                            </p>
                        </div>
                    </a>`;
                    @endforeach
                }

                document.getElementById('chatlist').innerHTML = datachecklist;
            }





 function datamodel(dat){

 }
function updateImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('profileImage');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
$(document).ready(function() {
    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
                url: "{{ route('user.store') }}",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('Successfully: ' + response.message );
                    $('#myModal').modal('hide');

                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    console.log(errors);
                    errorMessage="Error: ";
                    for (let field in errors) {
                        errorMessage += errors[field].join('<br>');
                    }
                    alert(errorMessage);
                }
            });
    });
});





                        </script>


    <script>
    // Event listener for the search bar input
    $('#searchBar').on('input', function() {
        let searchQuery = $(this).val();

        // If the search query is empty, clear the user list
        if (searchQuery.length < 1) {
            $('#userList').html('');
            return;
        }

        $.ajax({
            url: '/search',
            method: 'GET',
            data: { query: searchQuery },
            success: function(response) {
                let userList = $('#userList');
                userList.empty();

                let html = '';

                if (response.length > 0) {
                    response.forEach(function(user) {
                        let profileImage = user.imgpath
                            ? '/assets/img/profiles/' + user.imgpath
                            : '/assets/img/userimg.png';

                        html += `
                            <div class="contact"
                                data-id="${user.id}"
                                data-name="${user.name}">

                                <div class="contact-info">
                                    <img src="${profileImage}" alt="${user.name}'s profile" class="profile-icon">
                                    <div class="contact-details">
                                        <p class="name">${user.name}</p>
                                        <p class="phone">${user.number}</p>
                                          <p class="phone">${user.Employee_id}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    html = '<p>No contacts found</p>';
                }

                userList.html(html);

                // Updated click handler to reload first, then open chat
                $('#userList').on('click', '.contact', function() {
                    alert(data)
                    console.log(data);
                    let userId = $(this).data('id');
                    let userName = $(this).data('name');
                    let empid = $(this).data('Employee_id');

                    $('#myModal1').modal('hide');
                    $('#searchBar').val('');
                    $('#userList').empty();

                    // Store the user data in localStorage before reloading
                    localStorage.setItem('selectedUserId', userId);
                    localStorage.setItem('selectedUserName', userName);
                    localStorage.setItem('selectedempid', empid);
                    // Reload the page
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.error("Search error:", error);
                $('#userList').html('<p>Error loading contacts</p>');
            }
        });
    });



    let selectedUsers = []; // Array to store selected users

// Function to fetch and display all users with checkboxes
function loadAllUsers() {
   var searchBargroupx = document.getElementById("searchBargroupx").value;
    $.ajax({
        url: '/get-all-users', // Endpoint to fetch all users
        method: 'GET',
        data: { query: searchBargroupx },
        success: function (response) {
            let userListgroup = $('#userListgroup');
            userListgroup.empty(); // Clear previous content

            if (response.length > 0) {
                // Iterate through the users and display each with a checkbox
                response.forEach(function (user) {
                    let profileImage = user.imgpath
                        ? '/assets/img/profiles/' + user.imgpath
                        : '/assets/img/userimg.png';

                    userListgroup.append(`
                        <div class="user-item">
                      <input
    type="checkbox"
    class="user-checkbox"
    id="user-${user.id}"
    value="${user.name}"
    onclick="toggleUserWithId('${user.name}', '${user.Employee_id}')"
>

                            <label for="user-${user.id}">
                                <div class="contact-info">
                                    <img src="${profileImage}" alt="${user.name}'s profile" class="profile-icon">
                                    <div class="contact-details">
                                        <p class="name">${user.name}(${user.Department})</p>
                                        <p class="phone">${user.number}</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    `);
                });
            } else {
                userListgroup.append('<p>No contacts found</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching users: ", error);
        }
    });
}

// Consolidated toggle function
function toggleUserWithId(userName, Employee_id) {
    // Create a unique identifier for the user
    const userKey = `${userName}@${Employee_id}`;

    if (selectedUsers.includes(userKey)) {
        // If user is already selected, remove them
        selectedUsers = selectedUsers.filter(user => user !== userKey);
    } else {
        // Add user to the list
        selectedUsers.push(userKey);
    }

    // Update both search bars
    $('#searchBargroup').val(selectedUsers.map(user => user.split('@')[0]).join(', ')); // Names only
    $('#searchBargroupwithid').val(selectedUsers.join(', ')); // Names with IDs
}







    $('#createGroupBtn').click(function () {
        // Check if the modal already exists to prevent duplicates
        if ($("#groupNameModal").length === 0) {
            $('#myModal2 .modal-body').append(`
                <div id="groupNameModal" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); z-index: 1050; width: 300px;">
                    <h4>Enter Group Name</h4>
                    <input type="text" id="groupNameInput" class="form-control" placeholder="Group Name">
                    <br>
                    <button id="submitGroupName" class="btn btn-success">Create</button>
                    <button id="cancelGroupName" class="btn btn-danger">Cancel</button>
                </div>
            `);
        } else {
            $('#groupNameModal').show();
        }
    });

    $(document).on('click', '#submitGroupName', function () {
        var groupName = $('#groupNameInput').val().trim();
        if (!groupName) {
            showCustomAlert('Group name is required!', 'danger');
            return;
        }

        var selectedUsers = document.getElementById("searchBargroupwithid").value;
        var user1Name = '{{$userdata->name}}';

        $.ajax({
            url: '/store-group',
            method: 'GET',
            data: {
                group_name: groupName,
                members: selectedUsers,
                user1Name: user1Name,
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                showCustomAlert('Group created successfully!', 'success');
                setTimeout(() => location.reload(), 2000); // Reload after 2 sec
            },
            error: function (xhr, status, error) {
                console.error('Error creating group:', error);
                showCustomAlert('Error creating group. Please try again.', 'danger');
            },
        });

        $('#groupNameModal').remove();
    });

    $(document).on('click', '#cancelGroupName', function () {
        $('#groupNameModal').remove();
    });

    // Custom alert function
    function showCustomAlert(message, type) {
        if ($("#customAlert").length === 0) {
            $('#myModal2 .modal-body').append(`
                <div id="customAlert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); background: ${type === 'success' ? '#28a745' : '#dc3545'}; color: white; padding: 10px 20px; border-radius: 5px; z-index: 1051; display: none;">
                    ${message}
                </div>
            `);
        } else {
            $('#customAlert').text(message).css("background", type === 'success' ? '#28a745' : '#dc3545');
        }

        $('#customAlert').fadeIn().delay(2000).fadeOut();
    }





// Load all users when the modal is shown
$('#myModal2').on('show.bs.modal', function () {
 loadAllUsers();
});


// Function to open a chat when clicking on a user
function openChat(user2Id, user2Name) {
    const user1Name = '{{$userdata->name}}';  // Get logged-in user's name from Blade

    console.log("User1: ", user1Name);  // Log user1 to check
    console.log("User2: ", user2Name);  // Log user2 to check

    $.ajax({
        url: '/save-chat',   // Send request to backend
        method: 'POST',
        data: {
            user1: user1Name,  // Correct logged-in user's name
            user2: user2Name,  // Correct selected user's name
            _token: '{{ csrf_token() }}',  // CSRF token for security
        },
        success: function(response) {
            console.log('Response:', response);

            // Check if chat_id is returned, then navigate to the chat page
            if (response.chat_id) {
                window.location.href = ``;
            } else {
                console.log('Error:', response.message);  // Log error message if no chat_id
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.log('Response:', xhr.responseText);  // Log full response for debugging
        }
    });
}

    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    encrypted: true
});

const channel = pusher.subscribe('chat');
channel.bind('message', function(data) {
    // Update message preview for the relevant chat

    const currentUserEmpId = '{{ session()->get('emp_id') }}';
    if (data.empid2 === currentUserEmpId || data.empid1 === currentUserEmpId) {
        handleNewMessageOrContact(data);
    }

    updateMessagePreview(data);
});

function handleNewMessageOrContact(data) {
    const currentUserEmpId = '{{ session()->get('emp_id') }}';
    const chatList = document.getElementById('chatlist');

    // Determine if this is a new contact or existing chat
    const existingChat = findExistingChat(data.empid1 === currentUserEmpId ? data.empid2 : data.empid1);

    if (existingChat) {
        updateExistingChat(existingChat, data);
    } else {
        createNewChatEntry(data);
    }

    // Sort chats to show most recent first
    sortChatsByLatest();
}

function findExistingChat(empId) {
    const chatItems = document.querySelectorAll('.chat-list a');
    for (let chat of chatItems) {
        const empIdSpan = chat.querySelector('h3 span');
        if (empIdSpan && empIdSpan.textContent === empId) {
            return chat;
        }
    }
    return null;
}

function updateExistingChat(chatElement, data) {
    const messagePreview = chatElement.querySelector('.message-text');
    const previewContainer = chatElement.querySelector('.message-preview');

    // Update message preview
    if (data.message) {
        messagePreview.textContent = data.message.length > 30
            ? data.message.substring(0, 30) + '...'
            : data.message;
    }

    // Handle file attachments
    if (data.file_path) {
        updateFilePreview(previewContainer, data.file_path);
    }

    // Move chat to top
    const chatList = document.getElementById('chatlist');
    chatList.insertBefore(chatElement, chatList.firstChild);
}

function createNewChatEntry(data) {


    const currentUserEmpId = '{{ session()->get('emp_id') }}';
    const currentUsername = '{{ session()->get('chat_name') }}'
    const otherUserEmpId = data.empid1 === currentUserEmpId ? data.empid2 : data.empid1;
    const otherUserName = data.firstuser === currentUsername ? data.seconduser : data.firstuser;

    const newChatHtml = `
        <a class="d-flex align-items-center" onclick="chatcreation(${data.chat_id},'${otherUserName}',${data.empid2},${data.empid1})">

            <div class="flex-shrink-0">
                <img class="img-fluid" src="{{asset('assets/img/userimg.png')}}" alt="user img" style="cursor:pointer;">
                <span class="active"></span>
            </div>
            <div class="flex-grow-1 ms-3">
                <h3 style="cursor:pointer;">${otherUserName} (<span>${otherUserEmpId}</span>)</h3>
                <div class="message-preview">
                    ${data.file_path ? getFilePreviewHtml(data.file_path) : ''}
                    <p class="message-text" style="cursor:pointer;">
                        ${data.message || 'New contact'}
                    </p>
                </div>
            </div>
        </a>
    `;

    const chatList = document.getElementById('chatlist');
    chatList.insertAdjacentHTML('afterbegin', newChatHtml);
}

function updateFilePreview(container, filePath) {
    // Remove existing preview if any
    const existingPreview = container.querySelector('.chat-preview-image');
    if (existingPreview) {
        existingPreview.remove();
    }

    if (filePath.match(/\.(jpg|jpeg|png|gif)$/i)) {
        const previewImg = document.createElement('img');
        previewImg.src = filePath;
        previewImg.alt = 'Preview';
        previewImg.className = 'chat-preview-image';
        container.insertBefore(previewImg, container.firstChild);
    }
}


function getFilePreviewHtml(filePath) {
    if (filePath.match(/\.(jpg|jpeg|png|gif)$/i)) {
        return `<img src="${filePath}" alt="Preview" class="chat-preview-image">`;
    }
    return '';
}

function sortChatsByLatest() {
    const chatList = document.getElementById('chatlist');
    const chats = Array.from(chatList.children);

    // Sort based on last message time (you'll need to add timestamps to your messages)
    chats.sort((a, b) => {
        // If you have timestamps, use them here
        // For now, we'll keep the most recent at top
        return -1;
    });

    // Reappend in sorted order
    chats.forEach(chat => chatList.appendChild(chat));
}



function updateMessagePreview(data) {
    console.log("Data object received:", data);
    console.log("Keys in data:", Object.keys(data));

    // Check if data is valid
    if (!data || typeof data !== "object") {
        console.error("Invalid data object passed.");
        return;
    }

    // Extract empid1 and empid2, with fallbacks for safety
    const empid1 = data.empid1 || null;
    const empid2 = data.empid2 || null;

    if (!empid1 || !empid2) {
        console.error("empid1 or empid2 is missing in the data object.");
        console.log("Data keys:", Object.keys(data));
        return;
    }

    console.log("Empid1:", empid1, "Empid2:", empid2);

    const chatItems = document.querySelectorAll('.chat-list a');


    chatItems.forEach(chatItem => {
        const chatnameElement = chatItem.querySelector('h3');
        const chatname = chatnameElement.textContent.trim();

        console.log(chatname+"chatname");
        // Regex to extract name and username
        const regex = /^(.+?) \((.+?)\)$/;
        const match = chatname.match(regex);
        let name = chatname;
        let userid = null;

        if (match) {
            name = match[1];
            userid = match[2];
        }

        console.log("Extracted User ID:", userid);

        // Check if this chat item matches either empid1 or empid2
        if (userid === empid1 || userid === empid2) {
            const messagePreviewElement = chatItem.querySelector('.message-text');
            const previewContainer = chatItem.querySelector('.message-preview');

            // Update text preview
            if (data.message) {
                messagePreviewElement.textContent =
                    data.message.length > 30
                        ? data.message.substring(0, 30) + '...'
                        : data.message;
            }

            // Handle file previews if present
            if (data.file_path) {
                const existingPreview = previewContainer.querySelector('.chat-preview-image');
                if (existingPreview) {
                    existingPreview.remove();
                }

                if (data.file_path.match(/\.(jpg|jpeg|png|gif)$/i)) {
                    const previewImg = document.createElement('img');
                    previewImg.src = data.file_path;
                    previewImg.alt = 'Preview';
                    previewImg.className = 'chat-preview-image';
                    previewContainer.insertBefore(previewImg, messagePreviewElement);
                    messagePreviewElement.textContent = '';
                }
            }

            const chatList = document.getElementById('chatlist');
            chatList.insertBefore(chatItem, chatList.firstChild);
        }
    });
}

function openGroup(group_id, group_name)
{

    const user1Name = '{{$userdata->name}}';


    $.ajax({
        url: '/store-groupchat',
        method: 'GET',
        data: {
            group_id: group_id,
            group_name: group_name,
            created_by: user1Name,
            _token: '{{ csrf_token() }}',
        },
        success: function(response) {
            console.log('Response:', response);

            if (response.chat_id) {
                window.location.href = ``;
            } else {
                console.log('Error:', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.log('Response:', xhr.responseText);
        }
    });
}


    // Function to clear search results
    function clearSearch() {
        $('#userList').html('');  // Clear the user list
        $('#searchBar').val('');  // Clear the search input
    }

    // Clear search results when switching tabs
    $('.nav-link').on('click', function() {
        clearSearch();
    });
</script>

</script>

<script>
    $(document).ready(function() {
    checkStoredUser();

    $('#searchBar').on('input', function() {
        let searchQuery = $(this).val();
        if (searchQuery.length < 1) {
            $('#userList').html('');
            return;
        }

        $.ajax({
            url: '/search',
            method: 'GET',
            data: { query: searchQuery },
            success: displaySearchResults,
            error: (error) => {
                console.error("Search error:", error);
                $('#userList').html('<p>Error loading contacts</p>');
            }
        });
    });

    $(document).on('click', '.contact', function() {
        console.log('data attributes:', $(this).data());
        handleContactSelection($(this).data('id'), $(this).data('name'), $(this).data('employee_id'));
    });
});

function displaySearchResults(response) {
    let html = response.length ? response.map(user => `
        <div class="contact" data-id="${user.id}" data-name="${user.name}" data-Employee_id="${user.Employee_id}">
            <div class="contact-info">
                <img src="${user.imgpath ? '/assets/img/profiles/' + user.imgpath : '/assets/img/userimg.png'}"
                     alt="${user.name}'s profile" class="profile-icon">
                <div class="contact-details">
            <p class="name">${user.name}</p>
<p class="phone">${user.number}</p>
<p class="department">${user.Department}</p>
                </div>
            </div>
        </div>
    `).join('') : '<p>No contacts found</p>';

    $('#userList').html(html);
}

function handleContactSelection(userId, userName,empid) {

    localStorage.setItem('selectedUserId', userId);
    localStorage.setItem('selectedUserName', userName);
    localStorage.setItem('selectedempid', empid);
    location.reload();
}

function checkStoredUser() {
    const userId = localStorage.getItem('selectedUserId');
    const userName = localStorage.getItem('selectedUserName');
    const empid = localStorage.getItem('selectedempid');

    if (userId && userName) {

        openChatx(userId, userName,empid);
        localStorage.removeItem('selectedUserId');
        localStorage.removeItem('selectedUserName');
        localStorage.removeItem('selectedempid');
    }
}

function openChatx(user2Id, user2Name,empid) {

    $.ajax({
        url: '/save-chat',
        method: 'GET',
        data: {
            user1: '{{$userdata->name}}',
            user2: user2Name,
            user2_id: empid,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log(response);
            if (response.chat_id) {
                chatcreation(response.chat_id, user2Name,response.user1_id,response.user2_id);
                updateChatList(response.chat_id, user2Name,response.user1_id,response.user2_id,response.department);
            }
        },
        error: (error) => console.error('Chat creation error:', error)
    });
}

function sendMessage(chatId, message, userName) {
    $.ajax({
        url: '/send-message',
        method: 'POST',
        data: {
            chat_id: chatId,
            message: message,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                appendMessage(message);
                updateChatList(chatId, userName,empid1,empid2, message,department);
                setTimeout(() => location.reload(), 100);
            }
        },
        error: (error) => console.error('Message send error:', error)
    });
}

function appendMessage(message) {
    const messageHtml = `
        <div class="chat-message-right pb-4">
            <div>
                <img src="/assets/img/userimg.png" class="rounded-circle mr-1" alt="You" width="40" height="40">
            </div>
            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                <div class="font-weight-bold mb-1">You</div>
                ${message}
            </div>
        </div>
    `;
    $('.chat-messages').append(messageHtml);
}

function updateChatList(chatId, userName,empid1,empid2,department, lastMessage = 'Start a conversation') {

    const newChatHtml = `
        <a class="d-flex align-items-center" onclick="chatcreation(${chatId},'${userName}','${empid1}','${empid2}')">
            <div class="flex-shrink-0">
                <img class="img-fluid" src="/assets/img/userimg.png" alt="user img" style="cursor:pointer;">
                <span class="active"></span>
            </div>
            <div class="flex-grow-1 ms-3">
                <h3 style="cursor:pointer;">${userName} (<span>${department}</span>)</h3>
                <div class="message-preview">
                    <p class="message-text" style="cursor:pointer;">${lastMessage}</p>
                </div>
            </div>
        </a>
    `;

    const existingChat = $(`#chatlist a:contains("${userName}")`);
    if (existingChat.length) {
        existingChat.replaceWith(newChatHtml);
    } else {
        $('#chatlist').prepend(newChatHtml);
    }
}
</script>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('inlineFormInputGroup');
    const msgSearch = document.querySelector('.msg-search');

    // Create search results container
    const searchResults = document.createElement('div');
    searchResults.id = 'searchResults';
    searchResults.className = 'search-results-container';
    msgSearch.appendChild(searchResults);

    // Add event listener for search input
    searchInput.addEventListener('input', debounce(function(e) {
        const searchTerm = e.target.value.trim();
        if (searchTerm.length > 0) {
            searchMessages(searchTerm);
            searchResults.style.display = 'block';
        } else {
            clearSearchResults();
            searchResults.style.display = 'none';
        }
    }, 300));

    // Close search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!msgSearch.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    function searchMessages(searchTerm) {
        fetch('/search-messages', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ search: searchTerm })
        })
        .then(response => response.json())
        .then(data => displaySearchResults(data))
        .catch(error => console.error('Error:', error));
    }

    function displaySearchResults(results) {
        if (!searchResults) return;

        if (results.length === 0) {
            searchResults.innerHTML = `
                <div class="no-results">
                    <p>No results found</p>
                </div>
            `;
            return;
        }

        const resultsHTML = results.map(result => `
            <div class="search-result-item" onclick="openChat('${result.chat_id}', '${escapeHtml(result.user)}')">
                <div class="search-result-content">
                    <div class="search-result-header">
                        <span class="user-name">${escapeHtml(result.user)}</span>
                        <span class="timestamp">${result.time}</span>
                    </div>
                    <div class="message-preview">
                        ${highlightSearchTerm(
                            escapeHtml(result.message),
                            document.getElementById('inlineFormInputGroup').value
                        )}
                    </div>
                    ${result.file_path ? '<div class="attachment-indicator"><i class="fa fa-paperclip"></i></div>' : ''}
                </div>
            </div>
        `).join('');

        searchResults.innerHTML = resultsHTML;
    }

    function highlightSearchTerm(text, searchTerm) {
        if (!searchTerm) return text;
        const regex = new RegExp(`(${escapeRegExp(searchTerm)})`, 'gi');
        return text.replace(regex, '<span class="highlight">$1</span>');
    }

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function clearSearchResults() {
        if (searchResults) {
            searchResults.innerHTML = '';
        }
    }
});

// Updated openChat function to use chatcreation instead of loadChat
function openChat(chatId, userName) {
    if (chatId && userName) {
        // Call the existing chatcreation function
        chatcreation(chatId, userName);

        // Close the search results after selection
        const searchResults = document.getElementById('searchResults');
        if (searchResults) {
            searchResults.style.display = 'none';
        }

        // Clear the search input
        const searchInput = document.getElementById('inlineFormInputGroup');
        if (searchInput) {
            searchInput.value = '';
        }
    }
}
</script>
