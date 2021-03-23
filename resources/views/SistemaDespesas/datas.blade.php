
<select name="data">
@for ($i = date('m'); $i >= 1 ; $i--)

@switch($i)

            @case('12')

            	<option value="12"> Dezembro </option>
     
        @break

                    @case('11')

            	<option value="11"> Novembro </option>
     
        @break

            @case('10')

            	<option value="10"> Outubro </option>
     
        @break


            @case('09')

            	<option value="09"> Setembro </option>
     
        @break

                    @case('08')

            	<option value="08"> Agosto </option>
     
        @break

                   @case('07')

            	<option value="07"> Julho </option>
     
        @break

                    @case('06')

            	<option value="06"> Junho </option>
     
        @break

                    @case('05')

            	<option value="05"> Maio </option>
     
        @break


            @case('04')

            	<option value="04"> Abril </option>
     
        @break

                    @case('03')

            	<option value="03"> Março </option>
     
        @break

            @case('02')
     
	    <option value="02"> Fevereiro </option>

        @break


          @case('01')

          	<option value="01"> Janeiro </option>
     
        @break


@endswitch


@endfor

	</select>