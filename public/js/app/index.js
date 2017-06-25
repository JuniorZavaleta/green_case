$(document).ready(function(){

    var image = $('#image-row');

    $(document).on('click', '.detail', function(){

        var complaints = $(this).data('complaint');

        $.each(complaints, function(i) {
            console.log(complaints[i].img);
            image.append('<div class="col-md-4">'+
                        '<a>'+
                        '<img class="img-responsive" src="'+base_url+'/img/complaints/'+complaints[i].img+'"/>'+
                        '</a>'+
                        '</div>');
        });

        $('#commentary').val($(this).data('commentary'));
        $('#myModal').modal('show');
    });
});