require("./bootstrap");
$("#btnSubmit").click(function() {
    $("#form").submit();
    $(this).attr("disabled", "disabled");
});
$("#btnDelete").click(function() {
    $("#delete-form").submit();
    $(this).attr("disabled", "disabled");
});
