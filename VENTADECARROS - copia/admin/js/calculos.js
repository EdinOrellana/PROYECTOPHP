function interes() {
		var anos=document.getElementById('idaniosMinimoCredito').value;
		var precio=document.getElementById('idprecio').value;
		var resultadoMesesFinal=0;
		anos=parseInt(anos);
		precio=parseInt(precio);
		resultadoMesesFinal=(precio+(precio*(anos*0.08)))/(anos*12); // el resultado est mal la divicion 
		//deberia de ser precio total dividido los meses porqeue si no da demasiados desimales con cantidades grandes. 
		document.getElementById('res1').value=resultadoMesesFinal;
		
}
