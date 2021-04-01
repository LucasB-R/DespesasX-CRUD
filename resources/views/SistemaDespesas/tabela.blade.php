

  <ul class="responsive-table">
    <li class="table-header">
      <div class="coluna coluna-1">Valor</div>
      <div class="coluna coluna-2">Descrição</div>
      <div class="coluna coluna-3">Anexo</div>
      <div class="coluna coluna-4" >Data</div>
      <div class="coluna coluna-5">Opções</div>
    </li>
   
   

  

@foreach($despesas as $Despesa)




 <li class="table-row">
      <div class="coluna coluna-1" data-label="Valor">R$ {{number_format($Despesa->valor, 2, ',', '.')}}</div>
      <div class="coluna coluna-2" data-label="Descrição">{{$Despesa->descricao}}</div>
      <div class="coluna coluna-3" data-label="Anexo">
     
	   	@if(strpos($Despesa->anexo, '/'))

  <a target="_blank" href="{{$Despesa->anexo}}"> <img id="minhaImagem" src="{{$Despesa->anexo}}" > </a>

        
	   @else

	       {{$Despesa->anexo}}
	    @endif
     </div>
      <div class="coluna coluna-4" data-label="Data">{{$Despesa->data}}</div>
      <div class="coluna coluna-5"> <a class="btn btn-success" href="{{Route('DespesasX - Editar', ['id' => $Despesa->id])}}">Editar</a>&nbsp
      <a class="btn btn-danger excluir" data-id="{{$Despesa->id}}">Deletar</a></div>
    </li>



@endforeach


  </ul>
{{$despesas->links('pagination::bootstrap-4')}}