$(document).ready(function (){
    $("#share").jsSocials({
        url: $("#detail-blog-url").val(),
        text: "Google Search Page",
        showLabel: false,
        showCount: "inside",
        shares: ["twitter", "facebook"]
    });
});

