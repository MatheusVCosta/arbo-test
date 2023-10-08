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
                    <div class="row wd-sm center">
                        <div class="content mg-1 small-card row-direction flex-1">
                            <label id="labelSelectPhotos" class="btn btn-orangepointer center labelSendFile hover" for="file">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        svg {
                                            fill: #fff;
                                            margin-right: 10px;
                                        }
                                    </style>
                                    <path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                </svg>
                                Selecionar fotos
                            </label>
                            <input type="file" name="photo[]" id="file" style="display:none" multiple>
                            <p id="fileInfo" class="text-center fileInformation flex-1">Nenhum Arquivo Selecionado</p>
                        </div>
                    </div>
                    <div id="preview"></div>
                </form>
            <?php  }
            ?>
            <form action="javascript:void(0)">
                <h2 class=" titulo-3">Endereço</h2>
                <div class="row center">
                    <div class="content mg-1 flex-1">
                        <label for="txtPostalCode" class="form-label">Cep *</label>
                        <input required type="text" class="input-text" id="txtPostalCode" placeholder="00000-000" value="<?php echo isset($house_infos[0]['postal_code']) ? $house_infos[0]['postal_code'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtCountry" class="form-label">Páis *</label>
                        <input required type="text" class="input-text" id="txtCountry" placeholder="Brasil" value="<?php echo isset($house_infos[0]['country']) ? $house_infos[0]['country'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtState" class="form-label">Estado *</label>
                        <input required type="text" class="input-text" id="txtState" placeholder="São Paulo" value="<?php echo isset($house_infos[0]['state']) ? $house_infos[0]['state'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtCity" class="form-label">Cidade *</label>
                        <input required type="text" class="input-text" id="txtCity" placeholder="Jandira" value="<?php echo isset($house_infos[0]['city']) ? $house_infos[0]['city'] : "" ?>">
                    </div>
                </div>
                <div class="row center">
                    <div class="content mg-1 flex-1">
                        <label for="txtStreet" class="form-label">Rua *</label>
                        <input required type="text" class="input-text" id="txtStreet" placeholder="Rua josé fina da sila" value="<?php echo isset($house_infos[0]['street']) ? $house_infos[0]['street'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtDistrict" class="form-label">Bairro *</label>
                        <input required type="text" class="input-text" id="txtDistrict" placeholder="Bairro Bom Pastor" value="<?php echo isset($house_infos[0]['district']) ? $house_infos[0]['district'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtNumber" class="form-label">Número *</label>
                        <input required type="number" class="input-text" id="txtNumber" placeholder="322" value="<?php echo isset($house_infos[0]['number']) ? $house_infos[0]['number'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtComplement" class="form-label">Complemento (opcional)</label>
                        <input type="text" class="input-text" id="txtComplement" placeholder="Ex: Casa 2" value="<?php echo isset($house_infos[0]['complement']) ? $house_infos[0]['complement'] : "" ?>">
                    </div>

                </div>
                <h2 class="titulo-3">Sobre a casa</h2>
                <div class="row center">
                    <div class="content mg-1 flex-1">
                        <label required for="txtPrice" class="form-label">Preço</label>
                        <input type="text" class="input-text" id="txtPrice" placeholder=" R$ 500,00" value="<?php echo isset($house_infos[0]['price']) ? $house_infos[0]['price'] : "" ?>">
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtType" class="form-label">Tipo de imovél</label>
                        <select required class="input-text" id="txtType" style="background-color:#fff;">
                            <?php ?>
                            <option disabled <?php echo isset($house_infos[0]['house_type']) == '' ? '' : 'selected' ?>>Selecione</option>
                            <option value="Casa" <?php echo isset($house_infos[0]['house_type']) == 'Casa' ? 'selected' : '' ?>>Casa</option>
                            <option value="Apartamento" <?php echo isset($house_infos[0]['house_type']) == 'Apartamento' ? 'selected' : '' ?>>Apartamento</option>
                        </select>
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtTypeContract" class="form-label">Tipo de contrato</label>
                        <select required class="input-text" id="txtTypeContract" class="input-text" id="txtTypeContract" style="background-color:#fff;">
                            <option disabled <?php echo isset($house_infos[0]['contract_type']) == '' ? '' : 'selected' ?>>Selecione</option>
                            <option value="Venda" <?php echo  isset($house_infos[0]['contract_type']) == 'Venda' ? 'selected' : '' ?>>Venda</option>
                            <option value="Aluguel <?php echo isset($house_infos[0]['contract_type']) == 'Aluguel' ? 'selected' : '' ?>">Aluguel</option>
                        </select>
                    </div>
                </div>
                <div class="row center">
                    <div class="content mg-1 flex-1">
                        <label for="txtQtdRooms" class="form-label">Quantos Quartos</label>
                        <select class="input-text" id="txtQtdRooms" style="background-color:#fff;">
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <option value="<?= $i ?>" <?php echo isset($house_infos[0]['amout_room']) ? ($house_infos[0]['amout_room'] == $i  ? 'selected' : '') : ''  ?>>
                                    <?php echo isset($house_infos[0]['amout_room']) ? ($house_infos[0]['amout_room'] == $i ? $house_infos[0]['amout_room'] : $i) : $i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtQtdBath" class="form-label">Quantos banheiros</label>
                        <select class="input-text" id="txtQtdBath" style="background-color:#fff;">
                            <?php for ($i = 0; $i <= 4; $i++) { ?>
                                <option value="<?= $i ?>" <?php echo isset($house_infos[0]['amount_baths']) ? ($house_infos[0]['amount_baths'] == $i  ? 'selected' : '') : ''  ?>>
                                    <?php echo isset($house_infos[0]['amount_baths']) ? ($house_infos[0]['amount_baths'] == $i ? $house_infos[0]['amount_baths'] : $i) : $i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="content mg-1 flex-1">
                        <label for="txtQtdVacancy" class="form-label">Vagas de garagem</label>
                        <select class="input-text" id="txtQtdVacancy" style="background-color:#fff;">
                            <?php for ($i = 0; $i <= 4; $i++) { ?>
                                <option value="<?= $i ?>" <?php echo isset($house_infos[0]['amount_vacancy']) ? ($house_infos[0]['amount_vacancy'] == $i  ? 'selected' : '') : ''  ?>>
                                    <?php echo isset($house_infos[0]['amount_vacancy']) ? ($house_infos[0]['amount_vacancy'] == $i ? $house_infos[0]['amount_vacancy'] : $i) : $i ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <span class="line mg-1"></span>
                <div class="row center">
                    <div class="content mg-1 flex-1">
                        <label for="txtDesc" class="form-label">Descrição</label>
                        <textarea class="input-text" style="resize: none; height:100px" cols="30" rows="10" id="txtDesc" placeholder="Descreva mais sobre o imóvel."><?php echo isset($house_infos[0]['description']) ? $house_infos[0]['description'] : "" ?></textarea>
                    </div>
                </div>

                <div class="row center">
                    <div class="content mg-1 center flex-2">
                        <button class="btn btn-orange pointer" onclick="submitPage('<?php echo $page_mode ?>', '<?php echo isset($house_infos[0]['house_id']) ? $house_infos[0]['house_id'] : 0  ?>')" id="btnSendHouse" style="width:100%"> <?php echo $page_mode == 'insert' ? "Anunciar Casa" : "Editar Casa" ?></button>
                    </div>
                    <?php if ($page_mode === "edit") { ?>
                        <div class="content mg-1 center flex-2">
                            <button class="btn btn-delete pointer" onclick="deleteHouse(<?php echo $house_infos[0]['house_id'] ?>)" style="width:100%">Excluir Anuncio</button>
                        </div>
                    <?php } ?>
                </div>
            </form>
            <div id="message">
                <p id="InfoForm" class="text-information"></p>
                <p id="infoPhoto" class="text-information"></p>

            </div>
        </div>

    </div>
    <footer>
        <?php require_once("template/footer.php") ?>
    </footer>
</body>
<script src="views/assets/javascript/request.js"></script>

</html>