export default {
    methods: {
        importMask() {
            $(".cell-phone").mask("(00) 90000-0000");
            $(".phone").mask("(00) 0000-0000");
            $(".cep").mask("00000-000");

            let options = {
                onKeyPress: function (cpf, ev, el, op) {
                    let masks = ["000.000.000-000", "00.000.000/0000-00"];
                    $(".cpfcnpj").mask(cpf.length > 14 ? masks[1] : masks[0], op);
                },
            };

            $(".cpfcnpj").length > 11
                ? $(".cpfcnpj").mask("00.000.000/0000-00", options)
                : $(".cpfcnpj").mask("000.000.000-00#", options);
        }
    }
}
