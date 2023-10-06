// const { json } = require("stream/consumers");

const url_base = "/test-arbo/arbo-test";
const message_erros = {
    'type_error': {
        'field_null': "O campo '?' precisa ser preenchido"
    }
}



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
            window.location = `${url_base}/user_index`
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