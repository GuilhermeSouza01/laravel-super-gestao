<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome"  value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    @if ($errors->has('nome'))
    {{ $errors->first('nome') }}
        
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
   
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
   
   
    <br>


    <select name="motivo_contatos_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }} >{{$motivo_contato->motivo_contato}}</option>
        @endforeach

    </select>

    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
   
    <br>
    <textarea name="mensagem" class="borda-preta">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}}
    </textarea>

    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
   
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- <div style="position: absolute; top: 0px; left: 0px; width: 100%; background: red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
 --}}
