require("./bootstrap");
$(window).on("load", function() {
    $("#btnSubmit").click(function(e) {
        e.preventDefault();
        $("#form").submit();
        $(this).attr("disabled", "disabled");
    });
});
