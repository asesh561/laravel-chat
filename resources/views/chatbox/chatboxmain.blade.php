

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<style>
#scrollContainer {
    height: 100%;
    overflow-y: auto;
    scrollbar-width: none;
}

#scrollDown {
    position: absolute;
    bottom: 20%;
    width: 38px;
    right: 5%;
    z-index: 5;
    border: none;
    font-size: 25px;
    border-radius: 20px;
    color : black;
    background-color: rgba(255, 255, 255, 0.8);
}

#scrollContainer::-webkit-scrollbar {
    display: none; /* For Chrome, Safari, and Opera */
}

.send-box {
    position: relative;
}

.send-box input#message {
    padding-left: 30px; /* Ensures the message input doesn't overlap the "+" sign */
}

.send-box input#message::placeholder {
    color: #bbb;
    font-size: 16px;
}



.send-box {
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #f0f0f0;
    border-top: 1px solid #e0e0e0;
}

#plus-button {
    width: 40px;
    height: 40px;
    background-color: transparent;
    border: none;
    color: #919191;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    border-radius: 50%;
}

#plus-button:hover {
    background-color: rgba(0,0,0,0.1);
}

#plus-button i {
    font-size: 20px;
}

/* Attachment Options Styling */
#attachment-options {
    position: absolute;
    bottom: 70px;
    left: 10px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    overflow: hidden;
    width: 200px;
    z-index: 10;
}

.attachment-option {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.attachment-option:hover {
    background-color: #f0f0f0;
}

.attachment-option i {
    margin-right: 10px;
    color: #919191;
    font-size: 20px;
}

/* Message Input Styling */
#send-message-form {
    display: flex;
    align-items: center;
    flex-grow: 1;
    background-color: white;
    border-radius: 20px;
    padding: 5px 10px;
    margin-right: 10px;
}

#message {
    flex-grow: 1;
    border: none;
    outline: none;
    font-size: 16px;
    padding: 8px;
    background-color: transparent;
}

#send-message-form button {
    background-color: transparent;
    border: none;
    color: #919191;
    cursor: pointer;
    margin-left: 10px;
}

#send-message-form button i {
    font-size: 20px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .send-box {
        padding: 8px;
    }

    #plus-button, #send-message-form button i {
        font-size: 18px;
    }
}


.message {
    display: flex;
    margin-bottom: 12px;
    clear: both;
    align-items: flex-end;
}


.message.sent {
    justify-content: flex-end;
}

.message.sent .bubble {
    background-color: #dcf8c6;
    border-radius: 12px 12px 0 12px;
    max-width: 70%;
    padding: 8px 12px;
    position: relative;
    margin-left: auto;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.message.received {
    justify-content: flex-start;
}

.message.received .bubble {
    background-color: #ffffff;
    border-radius: 12px 12px 12px 0;
    max-width: 70%;
    padding: 8px 12px;
    position: relative;
    margin-right: auto;
    box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.timestamp {
display: block;
font-size: 10px;
color: #888;
text-align: right;
margin-top: 4px;
opacity: 0.7;
}

.message.sent .timestamp {
    color: #4a4a4a; /* Darker color for sent messages */
}


.message.received .timestamp {
    color: #666; /* Slightly lighter color for received messages */
}

.message.sent .bubble .timestamp {
    display: block;
    font-size: 10px;
    color: #888;
    text-align: right;
    margin-top: 5px;
    opacity: 0.7;
}

.file-preview {
    margin-bottom: 5px;
}


.file-preview.image img,
.file-preview.video video {
    max-width: 250px;
    max-height: 250px;
    border-radius: 10px;
}

/* File Preview Styles for Sent Messages */
.message.sent .file-preview {
    margin-bottom: 5px;
}

.message.sent .file-preview.image img {
    max-width: 250px;
    max-height: 250px;
    border-radius: 10px;
}

.message.sent .file-preview.video video {
    max-width: 250px;
    max-height: 250px;
    border-radius: 10px;
}

.file-preview.document .document-container {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 10px;
    max-width: 300px;
}


.message.sent .file-preview.document .document-container {
    background-color: #f0f0f0;
    padding: 12px 15px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    max-width: 350px; /* Increased max-width */
    width: 100%; /* Full width within bubble */
    box-sizing: border-box;
}

.message.sent .file-preview.document .document-icon {
    margin-right: 15px;
    color:rgb(251, 251, 251);
    font-size: 24px; /* Larger icon */
}

.message.sent .file-preview.document .document-details {
    flex-grow: 1;
    overflow: hidden;
}

.message.sent .file-preview.document .file-name {
    font-size: 16px; /* Increased font size */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
    color: #333;
}

.message.sent .file-preview.document .file-type {
    font-size: 14px; /* Slightly larger */
    color: #666;
    margin-top: 3px;
}

.document-icon {
    margin-right: 10px;
    color: #666;
}

.document-details {
    flex-grow: 1;
    overflow: hidden;
}

.document-details .file-name {
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.document-details .file-type {
    font-size: 12px;
    color: #888;
}

.download-icon {
    margin-left: 10px;
    color: #007bff;
}

.message.sent .file-preview.document .download-icon {
    color:rgb(248, 250, 251);
    margin-left: 15px;
    font-size: 20px; /* Larger download icon */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .message.sent .file-preview.document .document-container {
        padding: 10px 12px;
        max-width: 300px;
    }

    .message .bubble {
        max-width: 80%;
        padding: 6px 10px;
    }

    .file-preview.image img,
    .file-preview.video video {
        max-width: 200px;
        max-height: 200px;
    }

    .timestamp {
        font-size: 9px;
    }

    .message.sent .file-preview.document .document-icon {
        font-size: 20px;
        margin-right: 10px;
    }

    .message.sent .file-preview.document .file-name {
        font-size: 14px;
    }

    .message.sent .file-preview.document .file-type {
        font-size: 12px;
    }

}

.message .bubble {
    position: relative;
    padding-bottom: 20px; /* Extra space for timestamp */
}

.message .timestamp {
    font-size: 10px;
    color: #888;
    opacity: 0.7;
    text-align: right;
    margin-top: 4px;
    display: block;
}

.divider {
    text-align: center;
    margin: 15px 0;
    position: relative;
}

.divider h6 {
    background-color: #f0f0f0;
    display: inline-block;
    padding: 0 10px;
    color: #888;
    font-size: 12px;
    text-transform: uppercase;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    border-top: 1px solid #e0e0e0;
    z-index: -1;
}
</style>
<style>
/* Modal styles
.image-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    padding: 10px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    transition: all 0.3s ease;
}

.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90vh;
    cursor: zoom-out;
    transition: transform 0.3s ease;
}

.close-modal {
    position: absolute;
    right: 20px;
    top: 10px;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
    z-index: 1001;
}*/

/* Make chat images clickable
.file-preview.image img {
    cursor: zoom-in;
    transition: transform 0.2s ease;
}

.file-preview.image img:hover {
    transform: scale(1.05);
}*/

/* Animation classes
.zoom-in {
    animation: zoomIn 0.3s ease;
}

.zoom-out {
    animation: zoomOut 0.3s ease;
}

@keyframes zoomIn {
    from {
        transform: scale(0.3);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes zoomOut {
    from {
        transform: scale(1);
        opacity: 1;
    }
    to {
        transform: scale(0.3);
        opacity: 0;
    }
}*/
#drag-drop-zone {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 9999;
    display: none;
    justify-content: center;
    align-items: center;
}

.drop-message {
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.drop-message i {
    font-size: 48px;
    color:rgb(248, 248, 248);
    margin-bottom: 15px;
}

.drop-message h3 {
    margin: 0;
    color: #333;
}

.dragging {
    background-color: rgba(0, 123, 255, 0.1) !important;
}

.preview-item {
    cursor: move;
    transition: transform 0.2s ease;
}

.preview-item:hover {
    transform: translateY(-2px);
}

.preview-item.dragging {
    opacity: 0.5;
}

/* Style for the modal */
.modalx {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-contentx {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Width of the modal */
    max-width: 600px; /* Max width of the modal */
}

.modal-content1 {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Width of the modal */
    max-width: 600px; /* Max width of the modal */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}



.sender-info {
    display: flex;
    align-items: center;
}

.sender-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #007bff;  /* Change the background color as needed */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    font-weight: bold;
    font-size: 14px;
}



/* Circle for initials */
.circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    line-height: 30px;
    font-weight: bold;
    margin-right: 10px;
}

/* Member list item */
.member-info {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.member-name {
    font-size: 14px;
}

/* Action buttons at the bottom */
.action-buttons {
    margin-top: 20px;
    text-align: center;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    margin: 5px;
    border-radius: 5px;
}

button:hover {
    background-color: #45a049;
}
</style>

<div id="memberModal1" class="modalx" style="display: none;">
    <div class="modal-content1">
        <span id="closeModal1" class="close">&times;</span>
        <h2>Participants</h2>
        <ul id="memberList"></ul>


    </div>
</div>

<div class="modal fade" id="myModal2x">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center" id="mhead">Add new member</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="mbody">
                <div class="container">
                    <div class="row">
                        <input type="text" id="searchBargroupx" class="form-control" placeholder="Search by Name or Number">
                    </div>
                    <div class="row mt-3">
                        <div id="userListgroupx" class="col-md-12">
                            <!-- Contacts will be dynamically loaded here -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button id="updateGroupBtn" class="btn btn-primary">Add member</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="chatbox" >
 <div class="modal-dialog-scrollable" id="chatbox" style="display:none">
                                <div class="modal-content">
                                    <div class="msg-head">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                <!-- <a href="{{ route('ChatController') }}" class="back-btn" style="background: transparent; border: none; cursor: pointer; margin-right: 10px;">
        <i class="fa fa-arrow-left" style="font-size: 24px; color: #000;"></i>
    </a> -->
    <a href="{{ route('ChatController') }}" class="back-btn d-block d-md-none" style="background: transparent; border: none; cursor: pointer; margin-right: 10px;">
    <i class="fa fa-arrow-left" style="font-size: 24px; color: #000;"></i>
</a>
                                                   <div class="flex-shrink-0">
                                                        <img class="img-fluid" src="{{asset('assets/img/userimg.png')}}" alt="user img" id="profile">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                         <h3 id="chatname"></h3>
                                                        <h3 id="gchatname"></h3>
                                                        <h3 id="members"></h3>
                                                        <p id="descp"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <ul class="moreoption">
                                                    <li class="navbar nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <button id="scrollDown" class="arrow-down"><i class="fa fa-angle-down"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="modal-body">
                                        <div class="msg-body" id="scrollContainer">
                                        <ul id="chatMessages">
</ul></div></div>
     <div class="send-box">
    <!-- Button to trigger the file selection options -->
    <button style="width: 40px;" id="plus-button">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>

    <!-- Scrollable Attachment Options Dropdown -->
    <div id="attachment-options" class="attachment-options" style="display: none;">
        <div class="attachment-option" id="send-image">
            <i class="fa fa-image" aria-hidden="true"></i> Image
        </div>
        <div class="attachment-option" id="send-video">
            <i class="fa fa-video-camera" aria-hidden="true"></i> Video
        </div>
        <div class="attachment-option" id="send-document">
            <i class="fa fa-file" aria-hidden="true"></i> Document
        </div>
        <!-- Add more options as needed -->
    </div>

    <!-- Form to send a text message -->
    <form id="send-message-form" enctype="multipart/form-data">
        <input type="text" class="form-control" aria-label="message…" id="message" placeholder="Write message…">
        <input type="hidden" id="chatid" value="">
        <input type="hidden" id="chatuser" value="">
        <input type="hidden" id="empid1" value="">
        <input type="hidden" id="empid2" value="">

        <input type="hidden" id="chatuser" value="">
        <input type="hidden" id="gchatid" value="">
        <input type="hidden" id="gchatnamex" value="">
        <input type="hidden" id="gchatuser" value="">
        <input type="hidden" id="member_count" value="">
        <input type="hidden" id="membersx" value="">
        <button type="submit">
            <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
        </button>
    </form>
    <div id="drag-drop-zone">
    <div class="drop-message">
        <i class="fa fa-cloud-upload"></i>
        <h3>Drop files here</h3>
        <p>Release to upload files</p>
    </div>
</div>
    <!-- Hidden file input fields -->
    <input type="file" id="file-input-image"  name="file_path[]" accept="image/*" value="{{old('file_path')}}" multiple style="display: none;">
    <input type="file" id="file-input-video" name="file_path[]" accept="video/*" multiple style="display: none;">
    <input type="file" id="file-input-document" name="file_path[]" accept=".pdf,.doc,.docx,.txt,.ppt,.xls,.xlsx,.zip" multiple style="display: none;">
</div>
<div id="imageModal" class="image-modal" style="display: none;">
    <span class="close-modal">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>
<script>
    class FileUploadHandler {
    constructor() {
        this.dropZone = $('#drag-drop-zone');
        this.messageInput = $('#message');
        this.filePreviewContainer = $('#file-preview-container');

        this.initializeEventListeners();
    }

    initializeEventListeners() {
        // Drag and drop handlers
        $(document)
            .on('dragenter', this.handleDragEnter.bind(this))
            .on('dragover', this.handleDragOver.bind(this))
            .on('dragleave', this.handleDragLeave.bind(this))
            .on('drop', this.handleDrop.bind(this));

        // Paste handler
        this.messageInput.on('paste', this.handlePaste.bind(this));

        // Drop zone specific handlers
        this.dropZone
            .on('dragenter dragover', this.preventDefaults)
            .on('dragleave drop', this.hideDropZone.bind(this));

        // Preview container drag and drop
        this.initializePreviewDragDrop();
    }

    preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    handleDragEnter(e) {
        this.preventDefaults(e);
        this.dropZone.css('display', 'flex');
    }

    handleDragOver(e) {
        this.preventDefaults(e);
    }

    handleDragLeave(e) {
        this.preventDefaults(e);
        if (e.target === this.dropZone[0]) {
            this.hideDropZone();
        }
    }

    handleDrop(e) {
        this.preventDefaults(e);
        this.hideDropZone();

        if (e.originalEvent.dataTransfer?.files) {
            this.processFiles(e.originalEvent.dataTransfer.files);
        }
    }

    handlePaste(e) {
        const clipboardData = e.originalEvent.clipboardData || window.clipboardData;
        const items = clipboardData.items;

        const files = [];
        for (let i = 0; i < items.length; i++) {
            if (items[i].kind === 'file') {
                const file = items[i].getAsFile();
                if (file) files.push(file);
            }
        }

        if (files.length > 0) {
            e.preventDefault();
            this.processFiles(files);
        }
    }

    hideDropZone() {
        this.dropZone.hide();
    }

    processFiles(files) {
        const imageFiles = [];
        const videoFiles = [];
        const documentFiles = [];

        Array.from(files).forEach(file => {
            const fileType = file.type.split('/')[0];

            switch(fileType) {
                case 'image':
                    imageFiles.push(file);
                    break;
                case 'video':
                    videoFiles.push(file);
                    break;
                default:
                    documentFiles.push(file);
                    break;
            }
        });

        if (imageFiles.length) this.addFilesToInput('#file-input-image', imageFiles);
        if (videoFiles.length) this.addFilesToInput('#file-input-video', videoFiles);
        if (documentFiles.length) this.addFilesToInput('#file-input-document', documentFiles);

        // Trigger change events
        ['image', 'video', 'document'].forEach(type => {
            const input = $(`#file-input-${type}`)[0];
            if (input.files.length > 0) {
                $(input).trigger('change');
            }
        });
    }

    addFilesToInput(inputSelector, newFiles) {
        const input = $(inputSelector)[0];
        const dataTransfer = new DataTransfer();

        // Add existing files
        if (input.files.length) {
            Array.from(input.files).forEach(file => {
                dataTransfer.items.add(file);
            });
        }

        // Add new files
        newFiles.forEach(file => {
            dataTransfer.items.add(file);
        });

        input.files = dataTransfer.files;
    }

    initializePreviewDragDrop() {
        this.filePreviewContainer
            .on('dragstart', '.preview-item', this.handlePreviewDragStart.bind(this))
            .on('dragover', '.preview-item', this.handlePreviewDragOver.bind(this))
            .on('dragleave', '.preview-item', this.handlePreviewDragLeave.bind(this))
            .on('drop', '.preview-item', this.handlePreviewDrop.bind(this));
    }

    handlePreviewDragStart(e) {
        e.originalEvent.dataTransfer.setData('text/plain', $(e.currentTarget).index());
        $(e.currentTarget).addClass('dragging');
    }

    handlePreviewDragOver(e) {
        e.preventDefault();
        $(e.currentTarget).addClass('dragging');
    }

    handlePreviewDragLeave(e) {
        $(e.currentTarget).removeClass('dragging');
    }

    handlePreviewDrop(e) {
        e.preventDefault();
        $(e.currentTarget).removeClass('dragging');

        const fromIndex = parseInt(e.originalEvent.dataTransfer.getData('text/plain'));
        const toIndex = $(e.currentTarget).index();

        if (fromIndex !== toIndex) {
            const items = this.filePreviewContainer.children('.preview-item');
            const item = items.eq(fromIndex);

            if (fromIndex < toIndex) {
                item.insertAfter(items.eq(toIndex));
            } else {
                item.insertBefore(items.eq(toIndex));
            }
        }
    }
}

// Initialize when document is ready
$(document).ready(function() {
    new FileUploadHandler();
});
</script>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close-modal');
    let isZoomed = false;

    // Function to handle image click in chat
    function setupImageClickHandlers() {
        document.querySelectorAll('.file-preview.image img').forEach(img => {
            if (!img.hasClickHandler) {
                img.hasClickHandler = true;
                img.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const rect = this.getBoundingClientRect();

                    // Set initial position and size of modal image to match clicked image
                    modalImg.style.position = 'absolute';
                    modalImg.style.width = rect.width + 'px';
                    modalImg.style.height = rect.height + 'px';
                    modalImg.style.left = rect.left + 'px';
                    modalImg.style.top = rect.top + 'px';

                    modal.style.display = 'block';
                    modalImg.src = this.src;

                    // Animate to full size
                    requestAnimationFrame(() => {
                        modalImg.style.position = 'relative';
                        modalImg.style.width = '';
                        modalImg.style.height = '';
                        modalImg.style.left = '';
                        modalImg.style.top = '';
                        modalImg.classList.add('zoom-in');
                    });
                });
            }
        });
    }

    // Close modal when clicking close button or outside image
    modal.addEventListener('click', function(e) {
        if (e.target === modal || e.target === closeBtn) {
            closeModal();
        }
    });

    // Handle click on modal image for zoom
    modalImg.addEventListener('click', function(e) {
        e.stopPropagation();
        if (isZoomed) {
            this.style.transform = 'scale(1)';
        } else {
            this.style.transform = 'scale(1.5)';
        }
        isZoomed = !isZoomed;
    });

    function closeModal() {
        modalImg.classList.remove('zoom-in');
        modalImg.classList.add('zoom-out');
        setTimeout(() => {
            modal.style.display = 'none';
            modalImg.classList.remove('zoom-out');
            isZoomed = false;
            modalImg.style.transform = 'scale(1)';
        }, 300);
    }

    // Set up handlers for existing images
    setupImageClickHandlers();

    // Set up a MutationObserver to handle dynamically added images
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                setupImageClickHandlers();
            }
        });
    });

    // Start observing the chat messages container
    observer.observe(document.getElementById('chatMessages'), {
        childList: true,
        subtree: true
    });

    // Handle escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });
});
</script>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    const plusButton = document.getElementById("plus-button");
    const attachmentOptions = document.getElementById("attachment-options");

    // Flag to track if attachment options should be visible
    let isAttachmentOptionsVisible = false;

    // Toggle attachment options when plus button is clicked
    plusButton.addEventListener("click", function(e) {
        e.stopPropagation();

        // Toggle visibility
        isAttachmentOptionsVisible = !isAttachmentOptionsVisible;

        if (isAttachmentOptionsVisible) {
            attachmentOptions.style.display = "block";

            // Scroll to bottom when options open
            const scrollContainer = document.getElementById('scrollContainer');
            scrollContainer.scrollTop = scrollContainer.scrollHeight;
        } else {
            attachmentOptions.style.display = "none";
        }
    });

    // Close attachment options when clicking outside
    document.addEventListener('click', function(e) {
        // If attachment options are visible and click is outside both button and options
        if (isAttachmentOptionsVisible &&
            !plusButton.contains(e.target) &&
            !attachmentOptions.contains(e.target)) {

            attachmentOptions.style.display = "none";
            isAttachmentOptionsVisible = false;
        }
    });

    // Prevent attachment options from closing when clicking inside the options
    attachmentOptions.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});

function toggleUserx(userName) {
    if (selectedUsers.includes(userName)) {
        // If user is already selected, remove them
        selectedUsers = selectedUsers.filter(user => user !== userName);
    } else {
        // Add user to the list
        selectedUsers.push(userName);
    }

    // Update the search bar with the selected users
    $('#searchBargroupx').val(selectedUsers.join(', '));
}

$('#updateGroupBtn').click(function () {

var selectedUsers = document.getElementById("searchBargroupx").value;
var gchatname = $('#gchatname').html();
 const user1Name = '{{$userdata->name}}';

 $.ajax({
     url: '/update-group',
     method: 'GET',
     data: {
         group_name: gchatname,
         members: selectedUsers, // Array of selected user names
         user1Name: user1Name,
         _token: '{{ csrf_token() }}',
     },
     success: function (response) {
         alert('member added successfully!');
         location.reload();
     },
     error: function (xhr, status, error) {
      console.error('Error creating group:', error);
     },
 });
});






function loadAllUsersx() {
    const members = $('#membersx').val();
    $.ajax({
        url: '/get-rest-users', // Endpoint to fetch all users
        method: 'GET',
        data: {

            members: members,


        },
        success: function (response) {
            let userListgroup = $('#userListgroupx');
            userListgroup.empty(); // Clear previous content

            if (response.length > 0) {
                // Iterate through the users and display each with a checkbox

                response.forEach(function (user) {
                    let profileImage = user.imgpath
                        ? '/assets/img/profiles/' + user.imgpath
                        : '/assets/img/userimg.png';



                    userListgroup.append(`
                        <div class="user-item">
                            <input type="checkbox" class="user-checkbox" id="user-${user.id}" value="${user.name}" onclick="toggleUserx('${user.name}')">
                            <label for="user-${user.id}">
                                <div class="contact-info">
                                    <img src="${profileImage}" alt="${user.name}'s profile" class="profile-icon">
                                    <div class="contact-details">
                                        <p class="name">${user.name}</p>
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

function leavegroup() {


    var gchatname = $('#gchatname').html();
$.ajax({
    url: '/delete-user', // Endpoint to fetch all users
    method: 'GET',
    data: {
        group_name : gchatname,
        user: "@php echo session()->get('chat_name');@endphp",


    },
    success: function (response) {
         alert('you left the group successfully');
         location.reload();
     },

})

}

</script>
 <script>
$(document).ready(function() {
    // Create a container for file previews inside the message input area
    const filePreviewContainer = $(`
        <div id="file-preview-container" style="
            display: flex;
            overflow-x: auto;
            margin-top: 10px;
            padding: 5px;
            background-color: #f0f0f0;
            border-radius: 10px;
        "></div>
    `);

    // Insert the preview container after the message input
    $('#send-message-form').append(filePreviewContainer);

    // File input elements
    const fileInputs = {
        image: $('#file-input-image'),
        video: $('#file-input-video'),
        document: $('#file-input-document')
    };

    // Function to create file preview
    function createFilePreview(file) {
        const previewWrapper = $(`
            <div class="preview-item" style="
                position: relative;
                margin-right: 10px;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 80px;
            ">
        `);

        let previewElement;
        if (file.type.startsWith('image/')) {
            previewElement = $(`
                <img src="${URL.createObjectURL(file)}" style="
                    width: 60px;
                    height: 60px;
                    object-fit: cover;
                    border-radius: 10px;
                ">
            `);
        } else if (file.type.startsWith('video/')) {
            previewElement = $(`
                <div style="
                    width: 60px;
                    height: 60px;
                    background-color: #e0e0e0;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 10px;
                    text-align: center;
                    padding: 5px;
                ">
                    <i class="fa fa-video-camera"></i>
                    <small>${file.name}</small>
                </div>
            `);
        } else {
            previewElement = $(`
                <div style="
                    width: 60px;
                    height: 60px;
                    background-color: #e0e0e0;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 10px;
                    text-align: center;
                    padding: 5px;
                ">
                    <i class="fa fa-file"></i>
                    <small>${file.name.substring(0, 10)}...</small>
                </div>
            `);
        }

        // Remove preview button
        const removeBtn = $(`
            <div style="
                position: absolute;
                top: -5px;
                right: -5px;
                background-color: red;
                color: white;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                font-size: 12px;
            ">&times;</div>
        `);

        removeBtn.on('click', function() {
            // Remove the preview
            previewWrapper.remove();

            // Reset the corresponding file input
            if (file.type.startsWith('image/')) {
                fileInputs.image.val('');
            } else if (file.type.startsWith('video/')) {
                fileInputs.video.val('');
            } else {
                fileInputs.document.val('');
            }
        });

        previewWrapper.append(previewElement);
        previewWrapper.append(removeBtn);

        return previewWrapper;
    }

    // Function to handle file input changes
    function handleFileInputChange(input) {
        // Clear previous previews
        filePreviewContainer.empty();

        // Collect files from all inputs
        const allFiles = [
            ...fileInputs.image[0].files,
            ...fileInputs.video[0].files,
            ...fileInputs.document[0].files
        ];

        // Create previews for selected files
        allFiles.forEach(file => {
            const preview = createFilePreview(file);
            filePreviewContainer.append(preview);
        });

        // Show the preview container
        filePreviewContainer.show();
    }

    // Attach change event to all file inputs
    fileInputs.image.on('change', handleFileInputChange);
    fileInputs.video.on('change', handleFileInputChange);
    fileInputs.document.on('change', handleFileInputChange);

    // Attachment options handlers
    $("#send-image").on("click", function() {
        fileInputs.image.click();
    });

    $("#send-video").on("click", function() {
        fileInputs.video.click();
    });

    $("#send-document").on("click", function() {
        fileInputs.document.click();
    });

    // Message sending handler
    $('#send-message-form').on('submit', function(e) {
    e.preventDefault();

    const formData = new FormData();
    const message = $('#message').val() || '';
    const chatname = $('#chatname').html();

    // Add text data

    const gchatname = $('#gchatname').html();
    const user_id =  "@php echo session()->get('emp_id');@endphp";
    const isGroupChat = gchatname !== undefined && gchatname !== '';

    // Set user and chat info based on whether it's a group chat or not
    if (isGroupChat) {
        formData.append('user_name', "@php echo session()->get('chat_name');@endphp");
        formData.append('chat_name', gchatname);
        formData.append('user_id', user_id);
        formData.append('message', message);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    } else {
        formData.append('firstuser', "@php echo session()->get('chat_name');@endphp");
        formData.append('seconduser', $('#chatname').html());
        formData.append('empid1', $('#empid1').val());
        formData.append('empid2', $('#empid2').val());
        formData.append('message', message);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    }

    // Collect files from all inputs
    const allFiles = [
        ...fileInputs.image[0].files,
        ...fileInputs.video[0].files,
        ...fileInputs.document[0].files
    ];
    formData.forEach((value, key) => {
    console.log(key + ': ' + value);
});

    var filenames = [];
    for (let i = 0; i < allFiles.length; i++) {
        const file = allFiles[i];
 console.log(file);// [1]
            const chunkSize = 5 * 1024 * 1024; // 5MB chunks
            const totalChunks = Math.ceil(file.size / chunkSize);

            for (let i = 0; i < totalChunks; i++) {
                const start = i * chunkSize;
                const end = Math.min(start + chunkSize, file.size);

                const chunk = file.slice(start, end);

                const formData = new FormData();
                formData.append('file', chunk);
                formData.append('chunkIndex', i);
                formData.append('totalChunks', totalChunks);
                formData.append('fileName', file.name);

                axios.post('/upload-chunk', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
                console.log(`Uploaded chunk ${i + 1} of ${totalChunks}`);
            }
            filenames.push(file.name);
    }
    console.log(filenames);
    // return false;
    // Append files
    // allFiles.forEach(file => {
        formData.append('file_path[]', filenames);
    // });

    // Send if there are files or a message
    const url = isGroupChat ? '/send-groupmessage' : '/send-message';
    if (allFiles.length > 0 || message.trim() !== '') {

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            timeout: 1800000, // 30 minutes timeout
            success: function(response) {
                console.log(response);

                // Clear the message input field
                $('#message').val('');

                // Clear file previews
                filePreviewContainer.empty();

                // Reset file inputs
                fileInputs.image.val('');
                fileInputs.video.val('');
                fileInputs.document.val('');

                // Hide the file preview container
                filePreviewContainer.hide();
            },
            error: function(xhr, status, error) {
                if (status === 'timeout') {
                    alert('File upload timed out. Please try a smaller file or check your internet connection.');
                } else {
                    console.error('Error:', xhr.responseText);
                }
            }
        });
    }
});


// });

//     // Initially hide the preview container
//     filePreviewContainer.hide();
// });

$('#scrollDown').click(function() {
    $('#scrollContainer').animate({
scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
    }, 1000); });

var pusher = new Pusher('5d42f11d94cd2431176c', {
    cluster: 'mt1'
});
var channel = pusher.subscribe('chat');
channel.bind('message', function(data) {
    const chatid = $('#chatid').val();
    const chatuser = $('#chatuser').val();
    const empid1 = $('#empid1').val();
    const empid2 = $('#empid2').val();
    chatcreation(chatid,chatuser,empid1,empid2);
    $('#scrollContainer').animate({
scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
    }, 0);
});
var groupChannel = pusher.subscribe('group_chat');
groupChannel.bind('gmessage', function(data) {

    console.log("Pusher event triggered with data:", data);
    const members = $('#membersx').val();


    const gchatid = $('#gchatid').val();
    const gchatname = $('#gchatnamex').val();
    const gchatuser = $('#gchatuser').val();
    const member_count = $('#member_count').val();

    gchatcreation(gchatid,gchatname,gchatuser, member_count, members);

    $('#scrollContainer').animate({
scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
    }, 0);
});
});



function chatcreation(data,name,empid1,empid2){

        $('#chatname').html('');
    $('#gchatname').html('');
    $('#descp').html('');
    $('#members').html('');
    $('#member_count').val ('');
    $('#chatbox').css('display','');

    $('#chatname').html(name);
    $('#chatid').val(data);
    $('#chatuser').val(name);
    $('#empid1').val(empid1);
    $('#empid2').val(empid2);

    $.ajax({
        url: '/chat-designation',
        method: 'GET',
        data: {
            chatid: empid2,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#descp').html(response);
        }
    })
    $.ajax({
        url: '/chat-message',
        method: 'GET',
        data: {
            chatid: data,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            const todayDisplayed = false;
            const yesterdayDisplayed = false;
            const displayedDates = [];
            const todayDate = new Date();
            const yesterdayDate = new Date();
            yesterdayDate.setDate(todayDate.getDate() - 1);
            const formattedDate = (date) => {
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true });
            };
            const addDivider = (date) => {
                const dateString = date.toLocaleDateString();
                if (!displayedDates.includes(dateString)) {
                    displayedDates.push(dateString);
                    return `<li><div class="divider"><h6>${dateString}</h6></div></li>`;
                }
                return '';
            };

            let output = '';
            let outcheck = [];
            $('#chatMessages').html(''); // Clear existing messages

            response.data.forEach(msg => {

                const msgDate = new Date(msg.created_at);
                const formattedMsgDate = formattedDate(msgDate);

                if (msgDate.toDateString() === todayDate.toDateString() && !todayDisplayed) {
                    output = '<li><div class="divider"><h6>Today</h6></div></li>';
                } else if (msgDate.toDateString() === yesterdayDate.toDateString() && !yesterdayDisplayed) {
                    output = '<li><div class="divider"><h6>Yesterday</h6></div></li>';
                } else {
                    output = addDivider(msgDate);
                }

                if (!outcheck.includes(msgDate.toDateString())) {
                    outcheck.push(msgDate.toDateString());
                    $('#chatMessages').append(output);
                }

                // Handle null or empty messages
                const messageContent = msg.message ? msg.message.trim() : '';

                // Parse file paths (they might be comma-separated)
                const filePaths = msg.file_path ? msg.file_path.split(',').filter(path => path.trim() !== '') : [];

                if (msg.firstuser == "@php echo session()->get('chat_name');@endphp" && msg.firstuser_id == "@php echo session()->get('emp_id');@endphp") {
    // Messages sent by the current user (right side)
    var dataall = '';

    // Text message handling
    if (messageContent) {
        dataall += `
            <li class="message sent">
                <div class="bubble">
                    ${messageContent}
                    <span class="timestamp">${formattedMsgDate}</span>
                </div>
            </li>
        `;
    }
  filePaths.forEach(path => {
        const trimmedPath = path.trim();
        const fileName = trimmedPath.split('/').pop();
        const fileExtension = fileName.split('.').pop().toLowerCase();

        let filePreview = '';

        if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileExtension)) {
            filePreview = `
                <div class="file-preview image">
                    <img src="/${trimmedPath}" alt="Uploaded Image">
                </div>
            `;
        }
        else if (['mp4', 'webm', 'ogg'].includes(fileExtension)) {
            filePreview = `
                <div class="file-preview video">
                    <video controls>
                        <source src="/${trimmedPath}" type="video/${fileExtension}">
                        Your browser does not support the video tag.
                    </video>
                </div>
            `;
        }
        else {
            filePreview = `
                <div class="file-preview document">
                    <div class="document-container">
                        <div class="document-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="document-details">
                            <span class="file-name">${fileName}</span>
                            <span class="file-type">${fileExtension.toUpperCase()} File</span>
                        </div>
                        <a href="/${trimmedPath}" target="_blank" class="download-icon">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
            `;
        }

        dataall += `
            <li class="message sent">
                <div class="bubble">
                    ${filePreview}
                    <span class="timestamp">${formattedMsgDate}</span>
                </div>
            </li>
        `;
    });
} else {
    // Messages received from other users (left side)
    var dataall = '';

    // Text message handling
    if (messageContent) {
        dataall += `
            <li class="message received">
                <div class="bubble">
                    ${messageContent}
                    <span class="timestamp">${formattedMsgDate}</span>
                </div>
            </li>
        `;
    }

    // File uploads handling for received messages
    filePaths.forEach(path => {
        const trimmedPath = path.trim();
        const fileName = trimmedPath.split('/').pop();
        const fileExtension = fileName.split('.').pop().toLowerCase();

        let filePreview = '';

        if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileExtension)) {
            filePreview = `
                <div class="file-preview image">
                    <img src="/${trimmedPath}" alt="Uploaded Image">
                </div>
            `;
        }
        else if (['mp4', 'webm', 'ogg'].includes(fileExtension)) {
            filePreview = `
                <div class="file-preview video">
                    <video controls>
                        <source src="/${trimmedPath}" type="video/${fileExtension}">
                        Your browser does not support the video tag.
                    </video>
                </div>
            `;
        }
        else {
            filePreview = `
                <div class="file-preview document">
                    <div class="document-container">
                        <div class="document-icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="document-details">
                            <span class="file-name">${fileName}</span>
                            <span class="file-type">${fileExtension.toUpperCase()} File</span>
                        </div>
                        <a href="/${trimmedPath}" target="_blank" class="download-icon">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
            `;
        }

        dataall += `
            <li class="message received">
                <div class="bubble">
                    ${filePreview}
                    <span class="timestamp">${formattedMsgDate}</span>
                </div>
            </li>
        `;
    });
}



                if (dataall) {
                    $('#chatMessages').append(dataall);
                }
            });

            $('#scrollContainer').animate({
                scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
            }, 0);
        }
    });
}



function gchatcreation(data, name, user, member_count, members) {
    $('#chatname').html('');
    $('#gchatname').html('');
    $('#descp').html('');
    $('#member_count').val('');// Ensure group chat name is cleared
    $('#chatMessages').empty(); // Clear previous messages

    $('#chatbox').css('display', ''); // Show the chatbox

    $('#gchatid').val(data);
    $('#gchatnamex').val(name);
    $('#gchatuser').val(user);
    $('#member_count').val(member_count);
    $('#membersx').val(members);
    var membersx = JSON.parse(members);

    // Display the group chat details
    $('#gchatid').html(data);
    $('#gchatname').html(name);
    $('#members').html(`${member_count} members`).css('font-size', '12px');

    $('#gchatid').val(data);
    $('#gchatnamex').val(name);
    $('#gchatuser').val(user);
    $('#member_count').val(member_count);
    $('#member').val(members);

    $('#members').off('click').on('click', function () {

        if (Array.isArray(membersx) && membersx.length > 0) {

            $.ajax({
                url: '/chat-groupdesignation',
                method: 'GET',
                async: false,
                data: {
                    members: members,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Assuming response is an array like ['SHEKAR B@Manager', 'SHIVAKUMARA A@Not Found']
                    const memberListHtml = membersx.map((member, index) => {
                        const initials = member.split(' ').map(word => word[0]).join('');
                        const designation = response.data[index] ? response.data[index] : 'Not Found';
                        return `<li>
                            <div class="member-info">
                                <div class="circle">${initials}</div>
                                <span class="member-name">${member}</span>&nbsp;(${designation.split('@')[1]})
                            </div>
                        </li>`;
                    }).join('');
                    $('#memberList').html(memberListHtml); // Populate the list of members
                }
            });

        } else {
            $('#memberList').html('<li>No members available.</li>');
        }

        // Add "Add Members" and "Leave Group" buttons below the member list
        $('#memberList').append(`
            <div class="action-buttons">
                <button id="addMemberBtn" data-toggle="modal" data-target="#myModal2x" onclick="loadAllUsersx();">Add Member</button>
                <button id="leaveGroupBtn" onclick="leavegroup();">Leave Group</button>
            </div>
        `);

        // Show the modal with members list and buttons
        $('#memberModal1').css('display', 'block');
    });

    $('#closeModal1').on('click', function() {
        $('#memberModal1').css('display', 'none');
    });

    $.ajax({
        url: '/chat-gmessage',
        method: 'GET',
        data: {
            gchatid: data,
            gchatname: name,
            gchatuser: user,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const todayDisplayed = false;
            const yesterdayDisplayed = false;
            const displayedDates = [];
            const todayDate = new Date();
            const yesterdayDate = new Date();
            yesterdayDate.setDate(todayDate.getDate() - 1);

            const formattedDate = (date) => {
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true });
            };

            const addDivider = (date) => {
                const dateString = date.toLocaleDateString();
                if (!displayedDates.includes(dateString)) {
                    displayedDates.push(dateString);
                    return `<li><div class="divider"><h6>${dateString}</h6></div></li>`;
                }
                return '';
            };

            let output = '';
            let outcheck = [];
            response.data.forEach(msg => {
                const msgDate = new Date(msg.created_at);
                const formattedMsgDate = formattedDate(msgDate);

                if (msgDate.toDateString() === todayDate.toDateString() && !todayDisplayed) {
                    output = '<li><div class="divider"><h6>Today</h6></div></li>';
                } else if (msgDate.toDateString() === yesterdayDate.toDateString() && !yesterdayDisplayed) {
                    output = '<li><div class="divider"><h6>Yesterday</h6></div></li>';
                } else {
                    output = addDivider(msgDate);
                }

                if (!outcheck.includes(msgDate.toDateString())) {
                    outcheck.push(msgDate.toDateString());
                    $('#chatMessages').append(output);
                }

                var dataall = '';
                const senderName =
                    (msg.user === "@php echo session()->get('chat_name'); @endphp" &&
                    msg.user_id === "@php echo session()->get('emp_id'); @endphp")
                    ? 'You'
                    : msg.user;

                const senderInitials = senderName.split(' ').map(word => word[0]).join(''); // Get initials for display

                // Creating the circular name display
                const circle = `<div class="sender-avatar">${senderInitials}</div>`;

                if (msg.message) { // Check if the message is not null
                    dataall = `<li class="message sent">
                        <div class="sender-info">
                            ${circle}
                            <p><strong></strong> ${msg.message}</p>&nbsp;&nbsp;
                            <span class="time">${formattedMsgDate}</span>
                        </div>
                    </li>`;
                }

                $('#chatMessages').append(dataall);
            });

            $('#scrollContainer').animate({
                scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
            }, 0);
        }
    });
}



   function chatcreationbot() {
    // Fetch chat ID and user name from hidden inputs
    const chatId = $('#chatid').val();
    const chatUser = $('#chatuser').val();

    // Display the chatbox
    $('#chatbox').css('display', '');

    // Set the description and chat name
    $('#descp').html('New Chat');
    $('#chatname').html(chatUser);  // Displaying Bot as the chat user

    // Clear any existing chat messages
    $('#chatMessages').html('');

    // Append the chat ID and user name to the message list
    const startMessage = `
        <li class="info">
            <p>Chat ID: ${chatId}</p>
            <p>Chat User: ${chatUser}</p>
        </li>
    `;
    $('#chatMessages').append(startMessage);

    // Append the bot welcome message
    const botMessage = `
        <li class="sender">

            <span class="time">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true })}</span>
        </li>
    `;
    $('#chatMessages').append(botMessage);

    // Scroll to the bottom to show the latest message
    $('#scrollContainer').animate({
        scrollTop: $('#chatMessages li:last').position().top + $('#scrollContainer').scrollTop()
    }, 0);
}

// Event listener for the "Start" button
$('#start-message-form').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting
    chatcreationbot();   // Call the function to start the chat
});



    </script>
