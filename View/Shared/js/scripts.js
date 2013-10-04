$(function($){
   $("#data, .data").mask("99/99/9999");
   $("#datepicker, .datepicker, #from, #to").mask("99/99/9999");
   $("#telefone").mask("(99)9999-9999?");
});

$(function($){
	$('#orcamento').priceFormat({
		prefix: '',
	    centsSeparator: '.',
	    thousandsSeparator: ''
	});
});

$(document).ready(function() {
    $('#botaoCancelar').click(function() {
        history.back();
    });
});

$(function() {
    $( "input[type=submit], input[type=reset], button, .button" )
      .button()
      .click(function( event ) {
        
      });
  });

$(function() {
    $( "#tabs" ).tabs();
  });  
  
$(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content",
	  autoheight: true
	  });
  });
  
$(function() {
	    $( "#datepicker, .datepicker" ).datepicker({
	      showOn: "button",
	      buttonImage: "../shared/css/images/calendar-icon.png",
	      buttonImageOnly: true
	    });
	  });

  $(function ($) {
	    $.datepicker.regional['pt'] = {
	        closeText: 'Fechar',
	        prevText: '<Anterior',
	        nextText: 'Seguinte',
	        currentText: 'Hoje',
	        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
	        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
	        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
	        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
	        dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'S&aacute;bado'],
	        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
	        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'S&aacute;b'],
	        weekHeader: 'Sem',
	        dateFormat: 'dd/mm/yy',
	        firstDay: 0,
	        isRTL: false,
	        showMonthAfterYear: false,
	        yearSuffix: ''
	    };
	    $.datepicker.setDefaults($.datepicker.regional['pt']);
	});
	
	$(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
	      showOn: "button",
	      buttonImage: "../shared/css/images/calendar-icon.png",
	      buttonImageOnly: true,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
	      showOn: "button",
	      buttonImage: "../shared/css/images/calendar-icon.png",
	      buttonImageOnly: true,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });