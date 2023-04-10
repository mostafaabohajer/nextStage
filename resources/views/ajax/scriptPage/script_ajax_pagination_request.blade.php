<script type="text/javascript">

    $(document).on('click', '.thisPagination li a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        ajaxPagination(page);
    });

    function ajaxPagination(page) {
        $.ajax({
            type: "GET",
            url: "{{ route($route) }}" + "?page=" + page,
            success:function(data) {
                $('#{{$bivBack}}').html(data);
                $('html, body').animate({
                    scrollTop: $("#wrapper").offset().top
                }, 1000);
            }
        });
    }
</script>
