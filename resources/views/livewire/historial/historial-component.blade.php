<div>
    <x-card cardTitle="ANAMNESIS">


        <div class="row">
            <div class="col-md-4 border border-primary rounded p-3">
                <h6>
                    <div class="font-bold">INGRESE EL NUMERO DE CARNET DEL PACIENTE:</div>
                </h6>
                <div class="col-md-9">
                    <div wire:loading wire:target='search' class="spinner-grow text-info mr-2" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <input type="text" wire:model.live='search' class="form-control"
                        placeholder="Numero de Carnet del Paciente.....">
                </div>
                {{-- busqueda de un solo paciente --}}
                <br>
                
                @if ($pacient)
                    <br>
                    <h4>
                        <div class="font-bold text-2 ">DATOS DEL PACIENTE</div>
                    </h4>
                    <br>
                    <h6><span class="font-bold">CARNET DE IDENTIDAD:</span> {{ $pacient->ci }}</h6>
                    <h6><span class="font-bold">NOMBRE(S) Y APELLIDOS:</span> {{ $pacient->nombre }}
                        {{ $pacient->paterno }} {{ $pacient->materno }}</h6>
                    <h6><span class="font-bold">EDAD:</span> {{ $pacient->edad }} años</h6>
                    <h6><span class="font-bold">DIRECCION:</span> {{ $pacient->direccion }}</h6>
                    <h6><span class="font-bold">ULTIMA CONSULTA:</span> {{ $pacient->updated_at }}</h6>
                    <br>
                @else
                    <div></div>
                @endif
            </div>
            
            <div class="col-md-8">
                <form class="border border-primary rounded p-3">
                    <h4 class="text-center">REGISTRO DE DATOS DE ANAMNESIS</h4>
                    <div class="form-group">
                      <label for="motivo">MOTIVO:</label>
                      <input type="text" class="form-control mb-3" id="motivo" name="motivo">
                    </div>
                    <div class="form-group">
                      <label for="email">ENFERMEDAD:</label>
                      <input type="email" class="form-control mb-3" id="email" name="email">
                    </div>
                      <div class="form-group">
                        <label for="email">ANTECEDENTES PATOLOGICOS:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="motivo">ANTECEDENTES NO PATOLOGICOS:</label>
                        <input type="text" class="form-control mb-3" id="motivo" name="motivo">
                      </div>
                      <div class="form-group">
                        <label for="email">ANTECEDENTES GINECOLOGICOS:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="motivo">ANTECEDENTES FAIMLIARES:</label>
                        <input type="text" class="form-control mb-3" id="motivo" name="motivo">
                      </div>
                      <div class="form-group">
                        <label for="email">ANAMNESIS:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="motivo">EXAMEN FISICO:</label>
                        <input type="text" class="form-control mb-3" id="motivo" name="motivo">
                      </div>
                      <div class="form-group">
                        <label for="email">LABORATORIO:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="email">TRATAMIENTO:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email">
                      </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </x-card>
</div>
