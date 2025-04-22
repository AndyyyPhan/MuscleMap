$(document).ready(function () {
    $("#difficulty-filter").on("change", function () {
        const selected = $(this).val().toLowerCase();
        $(".card").each(function () {
            const difficultyText = $(this).find(".card-text:first").text().toLowerCase();
            if (selected === "all" || difficultyText.includes(selected)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});

const logSelection = () => {
    console.log("Exercise selected");
};
  