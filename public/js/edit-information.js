$(".btn-edit").click(function (e) {
    e.preventDefault();
    $(".hidden").addClass("show");
    $(".hidden").removeClass("hidden");
    $(".data").addClass("hidden");
    $(".btn-simpan").removeClass("hidden");
    $(".btn-edit").addClass("hidden");
});

$(".btn-simpan").click(function () {
    $("#form-edit").submit();
});

$(".btn-batal").click(function () {
    $(".hidden").removeClass("hidden");
    $(".show").addClass("hidden");
    $(".show").removeClass("show");

    $(".btn-edit").removeClass("hidden");
});
