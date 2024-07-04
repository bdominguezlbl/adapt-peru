@extends('theme.publicbase')

@section('title')
    Nueva Sede
@endsection
@section('content')
<style>
    #map {
      height: 100%;
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Nueva Sede</h2>
        </div>
    </div>
    <div class="row border rounded-4 p-3 border-success">
        <div class="col-md-8 col-12">
            <form action="{{route('sede.store')}}" method="POST" id="sedeForm">
                @csrf
                <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                <div class="form-group">
                    <label for="nombre">Nombre de la Sede</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la sede" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input id="address-input" type="text" class="form-control" placeholder="Ingresa una dirección" name="direccion" id="direccion"/>
                    <div id="autocomplete-results" class="autocomplete-suggestions"></div>
                </div>
                <div class="form-group">
                    <label for="responsable">Nombre Responsable</label>
                    <input type="text" class="form-control" name="responsable" id="responsable" placeholder="Nombre del responsable de la sede" required>
                </div>
                <div class="form-group">
                    <label for="email_responsable">Correo Responsable</label>
                    <input type="email" class="form-control" name="email_responsable" id="email_responsable" placeholder="Correo del responsable" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-3">Crear nueva sede</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-3">Estamos calculando los riesgos para su sede, espere un momento por favor.</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
            $('#address-input').on('input', function () {
                var query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: '{{ route("autocomplete") }}',
                        data: { query: query },
                        success: function (data) {
                            var suggestions = data.predictions;
                            var suggestionsContainer = $('#autocomplete-results');
                            suggestionsContainer.empty();
                            suggestions.forEach(function (suggestion) {
                                suggestionsContainer.append('<div class="autocomplete-suggestion" data-place-id="' + suggestion.place_id + '">' + suggestion.description + '</div>');
                            });

                            $('.autocomplete-suggestion').on('click', function () {
                                var placeId = $(this).data('place-id');
                                var description = $(this).text();
                                $('#address-input').val(description);
                                suggestionsContainer.empty();
                            });
                        }
                    });
                } else {
                    $('#autocomplete-results').empty();
                }
            });

            $('#sedeForm').on('submit', function(event) {
                event.preventDefault(); // Detener el envío del formulario para mostrar el modal primero
                $('#loadingModal').modal('show'); // Mostrar el modal
            this.submit(); // Enviar el formulario después de mostrar el modal
        });
        });
</script>




@endsection