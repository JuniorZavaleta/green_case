$(document).ready(function(){

    var image = $('#image-row');

    $(document).on('click', '.detail', function(){
        var complaints = [];
        complaints = $(this).data('complaint');
        console.log(complaints);
        image.html('');
        $.each(complaints, function(i) {
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