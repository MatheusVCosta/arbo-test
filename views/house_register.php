<?php
if (!isset($_SESSION['user_authenticated'])) {
    header('Location: /test-arbo/arbo-test');
}
?>
<html>
<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>

    <div id="app">
        <div id="message" style="text-align:center"></div>
        <?php
        if ($page_mode == "insert") { ?>
            <h1>Anunciar Meu Imóvel</h1>
        <?php } else {  ?>
            <h1>Editar Meu Imóvel</h1>
        <?php } ?>
        <span class="line"></span>
        <div class="container col">
            <?php if ($page_mode == "insert") { ?>
                <form action="javascript:void(0)" enctype="multipart/form-data" id="formFiles" name="formFiles">
                    <h2 class="titulo-3">Que tal algumas fotos?</h2>
                    <div id="message" style="text-align:center"></div>
                    <div class="row wd-sm ">

                        <div class="content mg-1 flex-1">
                            <label class="btn btn-send pointer center labelSendFile" for="file">Escolher fotos</label>
                            <input type="file" name="photo[]" id="file" style="display:none" multiple>
                        </div>
                        <div class="content mg-1 flex-1">
                            <button type="submit" class="btn btn-send pointer center" id="uploadPhoto">Enviar foto</button>
                        </div>

                    </div>
                </form>
            <?php  }
            ?>
            <form action="javascript:void(0)" id="<?= $page_mode ?>">
                <h2 class="titulo-3">Endereço</h2>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtPostalCode" class="form-label">Cep *</label>
                        <input type="text" class="input-text" id="txtPostalCode" placeholder="00000-000" value="<?php echo isset($house_infos[0]['postal_code']) ? $house_infos[0]['postal_code'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtStreet" class="form-label">Rua *</label>
                        <input type="text" class="input-text" id="txtStreet" placeholder="Rua josé fina da sila" value="<?php echo isset($house_infos[0]['street']) ? $house_infos[0]['street'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtDistrict" class="form-label">Bairro *</label>
                        <input type="text" class="input-text" id="txtDistrict" placeholder="Bairro Bom Pastor" value="<?php echo isset($house_infos[0]['district']) ? $house_infos[0]['district'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtNumber" class="form-label">Número *</label>
                        <input type="text" class="input-text" id="txtNumber" placeholder="322" value="<?php echo isset($house_infos[0]['number']) ? $house_infos[0]['number'] : "" ?>">
                    </div>
                </div>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtState" class="form-label">Estado *</label>
                        <input type="text" class="input-text" id="txtState" placeholder="São Paulo" value="<?php echo isset($house_infos[0]['state']) ? $house_infos[0]['state'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtCountry" class="form-label">Páis *</label>
                        <input type="text" class="input-text" id="txtCountry" placeholder="Brasil" value="<?php echo isset($house_infos[0]['country']) ? $house_infos[0]['country'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtComplement" class="form-label">Complemento (opcional)</label>
                        <input type="text" class="input-text" id="txtComplement" placeholder="Ex: Escola, Hospital" value="<?php echo isset($house_infos[0]['complement']) ? $house_infos[0]['complement'] : "" ?>">
                    </div>
                </div>
                <h2 class="titulo-3">Sobre a casa</h2>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtType" class="form-label">Tipo de imovél</label>
                        <input type="text" class="input-text" id="txtType" placeholder="Apartamento" value="<?php echo isset($house_infos[0]['house_type']) ? $house_infos[0]['house_type'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtTipeContract" class="form-label">Tipo de contrato</label>
                        <input type="text" class="input-text" id="txtTipeContract" placeholder="Aluguel">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtDesc" class="form-label">Descrição</label>
                        <input type="textarea" class="input-text" id="txtDesc" placeholder="Diga um pouco sobre a casa, sobre o bairro" value="<?php echo isset($house_infos[0]['description']) ? $house_infos[0]['description'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtPrice" class="form-label">Preço</label>
                        <input type="txt" class="input-text" id="txtPrice" placeholder=" R$ 500,00" value="<?php echo isset($house_infos[0]['price']) ? $house_infos[0]['price'] : "" ?>">
                    </div>
                </div>
                <span class="line mg-1"></span>
                <div class="row center">
                    <div class="content mg-1 center flex-2">
                        <button class="btn btn-send pointer" onclick="submeterPager(<?= $page_mode ?>, <?= $house_infos[0]['house_id'] ?>)" id="btnSendHouse" style="width:100%"><?php echo $page_mode == 'inseert' ? "Anunciar Casa" : "Editar Casa" ?></button>
                    </div>
                </div>
            </form>
            <div id="messagem">

            </div>
        </div>

    </div>
    <footer>
        <?php require_once("template/footer.php") ?>
    </footer>
</body>

<script>
    let photos_upload = []
    const url_base = "/test-arbo/arbo-test";

    function submeterPager(page_mode, house_id = "") {
        if (page_mode == "insert") {
            crateHouse(page_mode)
        } else if (page_mode == "edit") {
            editHouse(page_mode, house_id)
        }
    }

    function editHouse(page_mode, house_id) {
        elements = this.getElementsForm()
        isCanSend = validElementsForm(elements, page_mode)
        if (isCanSend == true) {
            url = `${url_base}/house_edit?house_id=${house_id}`
            sendRequest("POST", url, elements)
        } else {
            console.log('to aqui2')
        }
    }

    function crateHouse() {

    }

    function getElementsForm() {
        address = {
            'txtPostalCode': $("#txtPostalCode").val(),
            'txtStreet': $("#txtStreet").val(),
            'txtDistrict': $("#txtDistrict").val(),
            'txtNumber': $("#txtNumber").val(),
            'txtState': $("#txtState").val(),
            'txtCountry': $("#txtCountry").val(),
            'txtComplement': $("#txtComplement").val(),
        }

        about_house = {
            "txtType": $("#txtType").val(),
            "txtTipeContract": $("#txtTipeContract").val(),
            "txtDesc": $("#txtDesc").val(),
            "txtPrice": $("#txtPrice").val(),
        }

        photo_object = {
            photos_upload
        }

        let data = Object.assign(address, about_house);
        data = Object.assign(data, photo_object);

        console.log(data)
        return data
    }

    function validElementsForm(data, page_mode) {
        Object.entries(data).forEach(entry => {
            key = entry[0]
            value = entry[1]

            console.log(key)
            if (key == "txtComplement") {
                return
            }
            if (value != null) {
                return
            }
            console.log(value)
            $(`#${key}`).css({
                "border-color": 'red'
            })
        });
        if (data['photos_upload'].length == 0 && page_mode == "insert") {
            $("#message").html('<p style="color:red">Insira pelo menos uma foto</p>')
            return false
        } else {
            $("#message").html('<p style="color:red"></p>')
            return true
        }

    }

    function sendRequest(method, url, data) {

        $.ajax({
            type: method,
            url: url,
            data: data,
            success: (response) => {
                $("#message").html(`<p style="color:green; font-size:20px">${response['message']}!</p>`)
            },
            error: (response) => {
                $("#message").html(`<p style="color:red">Sinto muito, houve algum problema!</p>`)
            }
        })
    }
</script>
<script src="views/assets/javascript/request.js"></script>

</html>