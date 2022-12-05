$(document).ready(function () {
    $('#checkAll').click(function () {
        if($(this).is(":checked")){
            $(".checkItem").prop('checked', true);
        }
        else{
            $(".checkItem").prop('checked', false);
        }
    });
});

