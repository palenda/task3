$(document).ready(function () {
    $('#checkAll').click(function () {
        if($(this).is(":checked")){
            $(".checkItem").prop('checked', true);
        }
    });
});

