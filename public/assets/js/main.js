$(() => {
    $('.success__write').hide();
    $('.alert-danger').hide();

    $('.input__phone').mask("+7 (999) 999-9999")

    let date = new Date();

    $('.send__data').on('click', e => {
        e.preventDefault();
        $('.alert-danger').hide().html('');
        let objData = {
            'name': $('.input__name').val().trim(),
            'phone': $('.input__phone').val().trim(),
            'email': $('.input__email').val().trim(),
            'date': `${date.getDate()}.${date.getMonth() + 1}.${date.getFullYear()}`,
        }
        $.ajax({
            url: '/api/info/send',
            method: 'POST',
            data: {
                'arr': JSON.stringify(objData),
            },
            success: function (response) {
                let data = JSON.parse(response);
                switch (typeof data) {
                    case "object":
                        $('.alert-danger').show();
                        $('.alert-email').html(data['emailError']);
                        $('.alert-name').html(data['nameError']);
                        $('.alert-phone').html(data['phoneError']);
                        break;
                    case "string":
                        $('.success__write').show().html(data);
                        break;
                }
            }
        })
    })
})