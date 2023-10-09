// const { json } = require("stream/consumers");

const url_base = "/test-arbo/arbo-test";
const message_erros = {
    'type_error': {
        'field_null': "O campo '?' precisa ser preenchido"
    }
}

let photos_upload = []

$("#file").change((e) => {
    e.preventDefault()
    let files = $("#file").prop('files');
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
            $('#fileInfo').html(`<p style="color:green; font-size=20px">${files.length} arquivo selecionado </p>`)
        },
        error: (error) => {
            console.log(error)
        }
    })
})

function submitPage(page_mode, house_id) {
    if (page_mode == "insert") {
        crateHouse(page_mode)
    } else if (page_mode == "edit") {
        editHouse(page_mode, house_id)
    }
}

function editHouse(page_mode, house_id) {
    elements = this.getElementsForm()
    formIsValid = validElementsForm(elements, page_mode)
    if (formIsValid == true) {
        url = `${url_base}/house_edit?house_id=${house_id}`
        sendRequest("POST", url, elements)
    } else {

    }
}

function crateHouse(page_mode) {
    elements = this.getElementsForm()
    formIsValid = validElementsForm(elements, page_mode)
    if (formIsValid == true) {
        sendRequest("POST", `${url_base}/house_insert`, elements)
    }
}

function getElementsForm() {
    // console.log($("#txtQtdVacancy").val());
    address = {
        'txtPostalCode': $("#txtPostalCode").val(),
        'txtStreet': $("#txtStreet").val(),
        'txtDistrict': $("#txtDistrict").val(),
        'txtNumber': parseInt(parseInt($("#txtNumber").val())),
        'txtState': $("#txtState").val(),
        'txtCountry': $("#txtCountry").val(),
        'txtComplement': $("#txtComplement").val(),
        'txtCity': $("#txtCity").val(),
        'txtPrice': $("#txtPrice").val(),
    }

    about_house = {
        "txtType": $("#txtType").val(),
        "txtTypeContract": $("#txtTypeContract").val(),
        "txtDesc": $("#txtDesc").val(),
        "txtQtdRooms": $("#txtQtdRooms").val() ? $("#txtQtdRooms").val() : 0,
        "txtQtdBath": $("#txtQtdBath").val() ? $("#txtQtdBath").val() : 0,
        "txtQtdVacancy": $("#txtQtdVacancy").val() ? $("#txtQtdVacancy").val() : 0,
    }

    photo_object = {
        photos_upload
    }

    let data = Object.assign(address, about_house);
    data = Object.assign(data, photo_object);

    return data
}

function validElementsForm(data, page_mode) {
    fieldIgnore = ["txtQtdRooms", "txtComplement", "txtQtdVacancy", "txtQtdBath", "txtDesc"]
    formIsValid = true
    photoIsValid = true
    $("#InfoForm").html('');
    $("#infoPhoto").html('');

    Object.entries(data).forEach(entry => {

        key = entry[0]
        value = entry[1]
        if (fieldIgnore.includes(key)) {
            return
        }
        if (value == undefined || value == null || value == "" && key != 'photos_upload') {
            $(`#${key}`).css({ "border-color": 'red', "box-shadow": "5px 7px 11px 0px rgb(249 0 0 / 28%)" })
            formIsValid = false
        }
        if (key == 'photos_upload' && value < 1 && page_mode == "insert") {
            photoIsValid = false
        }

    });

    if (!formIsValid) {
        $("#InfoForm").append('Preencha todos os campos em vermelho')
        formIsValid = false
    }
    if (!photoIsValid && page_mode == "insert") {
        $("#infoPhoto").append("Insira pelo menos uma foto")
        photoIsValid = false
    }
    if (photoIsValid && page_mode == "insert") {
        console.log('photo')
        $("#infoPhoto").html('')
    }
    if (formIsValid) {
        console.log('form')
        $("#InfoForm").html('')
    }
    if (!formIsValid) {
        setTimeout(() => {
            Object.entries(data).forEach(entry => {
                key = entry[0]
                $(`#${key}`).css({ "border-color": 'gray', "box-shadow": "none" })
            });
        }, 2000)
    }

    return formIsValid && photoIsValid
}

function sendRequest(method, url, data) {
    console.log('sending_request...')
    $.ajax({
        type: method,
        url: url,
        data: data,
        success: (response) => {
            console.log(response)
            window.location = `${url_base}/user_index`
            $("#message").html(`<p style="color:green; font-size:20px">${response['message']}!</p>`)
        },
        error: (response) => {
            console.log('erro')
            $("#message").html(`<p style="color:red">Sinto muito, houve algum problema!</p>`)
        }
    })
}

function deleteHouse(houseId) {
    $("#message").html(``)
    $.ajax({
        type: 'GET',
        url: `${url_base}/house_delete`,
        data: { 'house_id': houseId },
        success: (response) => {
            alert(response['message'])
            window.location = `${url_base}/user_index`
        },
        error: (response) => {
            console.log(response)
            $("#message").html(`<p style="color:red">Sinto muito, houve algum problema!</p>`)
        }
    })
}

function applyFilter() {
    data = {
        "typeHouse": $("#selectTypeHouse").val(),
        "txtState": $("#txtState").val(),
        "txtCity": $("#txtCity").val(),

        "txtQtdRooms": $("#txtQtdRooms").val(),
        "txtQtdBaths": $("#txtQtdBaths").val(),
        "txtQtdVacancy": $("#txtQtdVacancy").val(),
    }
    console.log(data);
    $.ajax({
        url: `${url_base}/home_filter`,
        type: "GET",
        data: data,
        success: (data) => {
            if (data) {
                console.log(data)
                $("#renderizeContent").html()
                $("#renderizeContent").html(data)
            }

        },
    })
}
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
            window.location = `${url_base}/user_index`
        },
        error: (response) => {
            console.log(response)
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
            window.location = `${url_base} / `
        },
        error: (response) => {
            console.log(response)
        }
    })
})