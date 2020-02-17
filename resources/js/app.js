require("./bootstrap");
$("#btnSubmit").click(function() {
    $("#form").submit();
    $(this).attr("disabled", "disabled");
});
