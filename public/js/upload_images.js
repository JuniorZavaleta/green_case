$(function () {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        maxNumberOfFiles: 3,
        dataType: 'json',
        autoUpload: false,
        replaceFileInput: false,
    });
});
