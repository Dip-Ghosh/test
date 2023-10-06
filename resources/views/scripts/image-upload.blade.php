<script type="text/javascript">
    $(document).ready(function () {
        $('#image-upload').on('submit', function (event) {
            event.preventDefault();

            var url = "{{ route('images.store') }}";

            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $('#image').attr('src', response.image).show();

                    alert(response.message)
                },
                error: function (response) {
                    $('.error').remove();
                    $.each(response.responseJSON.errors, function (k, v) {
                        $('[name=\"image\"]').after('<p class="error">' + v[0] + '</p>');
                    });
                }
            });
        });

    });
</script>
