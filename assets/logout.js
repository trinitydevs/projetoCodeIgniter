$('html').on('submit', '#sair', function (e) {
    e.preventDefault();
    var form = $(this)[0];
    var formData = new FormData(form);
    console.log('Token CSRF:', $('input[name="csrf_test_name"]').val());

    $.ajax({
        type: 'post',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_test_name"]').attr('content') },
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        url: url,
        data: formData,
        success: function (response) {
            formData.append('_token', $('input[name="csrf_test_name"]').val(response.csrf_test_name));
            if(response.success){
                window.location.href = "http://localhost/dbTest/";
            }
        },
        error: function () {
            alert('Erro ao fazer logout. Tente novamente.');
        }
    });
});
