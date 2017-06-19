$(function () {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        maxNumberOfFiles: 3,
        dataType: 'json',
        autoUpload: false,
        replaceFileInput: false,
        dropZone: null,
    });

    window.addEventListener("dragover",function(e){
        e = e || event;
        e.preventDefault();
    }, false);

    window.addEventListener("drop",function(e){
        e = e || event;
        e.preventDefault();
    }, false);
});
