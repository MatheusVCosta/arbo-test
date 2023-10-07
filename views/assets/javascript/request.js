// const { json } = require("stream/consumers");

const url_base = "/test-arbo/arbo-test";
const message_erros = {
    'type_error': {
        'field_null': "O campo '?' precisa ser preenchido"
    }
}

let photos_upload = []


$("#uploadPhoto").click((e) => {
    e.preventDefault()

    form = $('#formFiles')[0]
    formData = new FormData(form)
    $.ajax({
        url: `${url_base}/house_save_photo`,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: (data) => {
            photos_upload.push(data)
            $("#message").html(`<p style="color:green">${data.length} fotos enviadas com sucesso</p>`)
        },
        error: (error) => {
            console.log(error)
        }
    })
})

// insert_user
$("#btnSend").click((e) => {
    e.preventDefault()

    let txtName = $("#txtName").val();
    let txtEmail = $("#txtEmail").val();
    let txtPassword = $("#txtPassword").val();
    let data = {
        'txtName': txtName,
        'txtEmail': txtEmail,
        'txtPassword': txtPassword,
    }
    $.ajax({
        type: "POST",
        url: `${url_base}/user_insert`,
        data: data,
        success: function (response) {
            console.log(response)
            // window.location = `${ url_base } / user_index`
        },
        error: (response) => {
            console.log(response)
            response = response['responseJSON']
            type_error = response['type_error']
            field = response['field']

            friendly_message = message_erros['type_error'][type_error]
            $('#info').html(friendly_message.replace('?', field))
            $('#info').css({
                'color': 'red'
            })
        }
    })
})

$('#btnLogin').click((e) => {
    e.preventDefault()

    let txtEmail = $("#txtEmail").val();
    let txtPassword = $("#txtPassword").val();

    let data = {
        'txtEmail': txtEmail,
        'txtPassword': txtPassword,
    }
    $.ajax({
        type: "POST",
        url: `${url_base}/user_auth`,
        data: data,
        success: function (response) {
            console.log(response)
            window.location = `${url_base}/user_index`
        },
        error: (response) => {
            console.log(response)
        }
    })
})

$('#btnLogOut').click((e) => {
    $.ajax({
        type: "GET",
        url: `${url_base}/user_logout`,
        success: function (response) {
            console.log(response)
            window.location = `${url_base} / `
        },
        error: (response) => {
            console.log(response)
        }
    })
})