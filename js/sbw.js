<script>

$(window).scroll(function() {
    if ($(this).scrollTop() < 200) {
        $("#footer").hide();
    }
    else {
        $("#footer").show();
    }
});
</script>