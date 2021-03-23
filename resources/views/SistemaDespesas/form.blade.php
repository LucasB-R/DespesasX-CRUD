
 <div class="conteudo">


       

            <div class="TituloForm">
                <h1>Nova Despesa</h1>
            </div>

<div class="grupoForm">
                <label>	
                	<span>
                		Breve descrição da despesa
                	</span>
	<input type="text" name="descricao" maxlength="23"  {!!Route::currentRouteName() == "DespesasX - Editar" ? "value='".$dadosAtuais->descricao."'" : 'placeholder="Pix para João..."'!!}>

           </label>
            </div>

            <div class="grupoForm">
                <label>
                    <span>Valor da sua despesa</span>
	<input type="text" id="valor" name="valor" maxlength="10"  {!!Route::currentRouteName() == "DespesasX - Editar" ? "value='".number_format($dadosAtuais->valor, 2, ',', '.')."'" : 'placeholder="0,00"'!!}>

	             </label>
            </div>

            <div class="grupoForm">
                <label>
                    <span>Data da sua despesa</span>
	<input type="text" name="data"  {!!Route::currentRouteName() == "DespesasX - Editar" ? "value='".$dadosAtuais->data."'" : "value='".date('d/m/Y')."'"!!}   class="mascaraData">

	             </label>
            </div>

      <div class="grupoForm">
                <label> 
                	<span>Anexo (Opcional)</span>
    <input type="file" name="image">
	             </label>
            </div>

 


