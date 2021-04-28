$('#class_id').change(function() {
    var class_id = $(this).val();
    if (class_id) {
        $.ajax({
            type: "GET",
            url: "{{url('get-section-list-subject')}}?class_id=" + class_id,

            dataType: "json",

            success: function(res) {


                if (res) {



                    $("#section").empty();
                    $("#section").append('<option selected="" disabled>Select Teacher</option>');
                    $("#section").append(res.load);
                    //   $.each(res,function(key,value,subject){
                    //     $("#teacher").append('<option value="'+key+'">'+value+' '+subject+'</option>');
                    //   });

                } else {
                    $("#section").empty();

                }
            }
        });
    } else {

        $("#section").empty();

    }
});

$('#section').change(function() {
    var section_id = $(this).val();
    if (section_id) {
        $.ajax({
            type: "GET",
            url: "{{url('get-subject-list')}}?section_id=" + section_id,

            dataType: "json",

            success: function(res) {


                if (res) {



                    $("#subject").empty();

                    $("#subject").append(res.load);
                    //   $.each(res,function(key,value,subject){
                    //     $("#teacher").append('<option value="'+key+'">'+value+' '+subject+'</option>');
                    //   });

                } else {
                    $("#subject").empty();

                }
            }
        });
    } else {

        $("#subject").empty();

    }
});