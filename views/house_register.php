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
        <h1>Anunciar Meu Imóvel</h1>
        <span class="line"></span>
        <div class="container col">
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
            <form>
                <h2 class="titulo-3">Endereço</h2>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtPostalCode" class="form-label">Cep *</label>
                        <input type="text" class="input-text" id="txtPostalCode" placeholder="00000-000">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtStreet" class="form-label">Rua *</label>
                        <input type="text" class="input-text" id="txtStreet" placeholder="Rua josé fina da sila">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtDistrict" class="form-label">Bairro *</label>
                        <input type="text" class="input-text" id="txtDistrict" placeholder="Bairro Bom Pastor">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtNumber" class="form-label">Número *</label>
                        <input type="text" class="input-text" id="txtNumber" placeholder="322">
                    </div>
                </div>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtState" class="form-label">Estado *</label>
                        <input type="text" class="input-text" id="txtState" placeholder="São Paulo">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtCountry" class="form-label">Páis *</label>
                        <input type="text" class="input-text" id="txtCountry" placeholder="Brasil">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtComplement" class="form-label">Complemento (opcional)</label>
                        <input type="text" class="input-text" id="txtComplement" placeholder="Ex: Escola, Hospital">
                    </div>
                </div>
                <h2 class="titulo-3">Sobre a casa</h2>
                <div class="row center w-sm ">
                    <div class="content mg-1 flex-1">
                        <label for="txtType" class="form-label">Tipo de imovél</label>
                        <input type="text" class="input-text" id="txtType" placeholder="Apartamento">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtTipeContract" class="form-label">Tipo de contrato</label>
                        <input type="text" class="input-text" id="txtTipeContract" placeholder="Aluguel">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtDesc" class="form-label">Descrição</label>
                        <input type="textarea" class="input-text" id="txtDesc" placeholder="Diga um pouco sobre a casa, sobre o bairro">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtPrice" class="form-label">Preço</label>
                        <input type="txt" class="input-text" id="txtPrice" placeholder=" R$ 500,00">
                    </div>
                </div>
                <span class="line mg-1"></span>
                <div class="row center">
                    <div class="content mg-1 center flex-2">
                        <button class="btn btn-send pointer" id="btnSendHouse" style="width:100%">Anunciar Casa</button>
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

<script src="views/assets/javascript/request.js"></script>

</html>