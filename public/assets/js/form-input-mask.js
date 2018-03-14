var FormInputMask = function(){

    var handleInputMasks = function(){

        $("#telefone_residencial").inputmask("mask", {
            "mask": "(99) [9]9999-9999",
			 clearMaskOnLostFocus: true,
			 autoUnmask: true,
			 removeMaskOnSubmit: true,

        });

        $("#celular").inputmask("mask", {
            "mask": "(99) [9]9999-9999",
			 clearMaskOnLostFocus: true,
			 autoUnmask: true,
			 removeMaskOnSubmit: true,

        });

        $("#data_nasc").inputmask('99/99/9999', {
    		clearMaskOnLostFocus: true,
    		autoUnmask: true,
    		rightAlign: false
        });

        $("#emissao_rg").inputmask('99/99/9999', {
    		clearMaskOnLostFocus: true,
    		autoUnmask: true,
    		rightAlign: false
		});

        $("#semestre_ano_graduacao").inputmask('99/9999', {
    		clearMaskOnLostFocus: true,
    		autoUnmask: true,
    		rightAlign: false
        });

      $("#cpf").inputmask('999.999.999-99', {
			clearMaskOnLostFocus: true,
			autoUnmask: true,
			rightAlign: false,
			removeMaskOnSubmit: true,
        });

      $("#cep").inputmask('99999-999', {
			clearMaskOnLostFocus: true,
			autoUnmask: true,
			rightAlign: false,
			removeMaskOnSubmit: true,
        });

		$("#cep").inputmask({removeMaskOnSubmit: true});
		$("#telefone").inputmask({removeMaskOnSubmit: true});
		$("#cpf").inputmask({removeMaskOnSubmit: true});
		$("#celular").inputmask({removeMaskOnSubmit: true});
    }

    return {
        init: function(){
            handleInputMasks();
        }
    };
}();

jQuery(document).ready(function() {
	FormInputMask.init(); // init metronic core componets
});
