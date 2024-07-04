@extends('theme.publicbase')

@section('title')
    Index Sede
@endsection

@section('content')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj9fDjfvj38CqeZc3q5IIoRu4mWNn1Mgc&libraries=places"></script>
  <script src="https://unpkg.com/@turf/turf@6.3.0/turf.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<div class="container">
    <div aria-label="breadcrumb" class="mt-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Panel de Control</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col">
          <div class="content">
              <h2 class="mb-4 text-center">(Paso 1) Identificación y priorización de peligros</h2>
              <h3 class="text-center">Sede: {{$sede->nombre}}</h3>
          </div>
        </div>
    </div>

    <form action="{{route("sede.set_direccion")}}" method="post">
        @csrf
        <input type="hidden" name="sede_id" value="{{$sede->id}}" >
        <div class="row @if($sede->direccion !='')d-none @endif" id="div_dir">
            <div class="col-auto ">
                <div class="form-group mb-2">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control ui-widget autocomplete-google   " name="direccion" id="direccion" required>
                    @error('direccion')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" onclick="load()" id="press">
                        Guardar dirección
                    </button>
                    <button class="btn btn-success" type="button" disabled id="load">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Calculando...
                    </button>

                </div>
            </div>
        </div>
                        
    </form>

    <div class="row ">
        <div class="col">
            @if($sede->direccion =="") 
            Para continuar, debe ingresar una dirección válida. <span data-bs-toggle="tooltip" data-bs-placement="right" title="Esta información se utilizará para el cálculo de los riesgos"><i class="bi bi-info-circle"></i></span> 
            @else Direccion: {{$sede->direccion}} 
            <p>
                <input type="checkbox" name="open_add" id="open_add">
                <label class="form-check-label check_label" for="open_add" >
                    ¿Desea actualizar su dirección?
                  </label>
                </p>
            @endif
            
        </div>
    </div>
    @if($sede->direccion !="") 
    <div class="row">
      <div class="col">
        <p class="sub_titulo_paso">¿Que peligros físicos son relevantes para mi empresa?</p>
        <p class="descripcion_paso">Reconozca cuáles son los peligros que le representan mayor amenaza (hoy, para el 2030 y para e 2050) a su empresa, de acuerdo con su ubicación en el terreno peruano:</p>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6">
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Peligro Físico</th>
                        <th>2020</th>
                        <th>2030</th>
                        <th>2050</th>                        
                    </tr>
                    </thead>
                    <tbody>                    
                        @foreach ($riesgos as $peligro => $años)
                        <tr>
                            <td class="text-nowrap">{{ ucfirst($peligro) }}</td>
                            <td class="text-nowrap riesgo_{{$años['2020']['nivel']}}">{{ $años['2020']['name'] ?? 'N/A' }}</td>
                            <td class="text-nowrap riesgo_{{$años['2030']['nivel']}}">{{ $años['2030']['name'] ?? 'N/A' }}</td>
                            <td class="text-nowrap riesgo_{{$años['2050']['nivel']}}">{{ $años['2050']['name'] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach                
            </table>
        </div>
        <div class="col-12 col-xl-6">
            <div>
                <div id="map"></div>
                <center>
                <select id="tipoMapa" class="form-select">
                    <option value=""> -- SELECCIONE -- </option>
                    <option value="INUNDACT"> Inundaciones 2020 </option>
                    <option value="INUND30"> Inundaciones 2030 </option>
                    <option value="INUND50"> Inundaciones 2050 </option>
                    <option value="MOVMASAACT"> Movimiento en Masa 2020 </option>
                    <option value="MOVMASA30"> Movimiento en Masa 2030 </option>
                    <option value="MOVMASA50"> Movimiento en Masa 2050 </option>
                    <option value="NIVERO2"> Erosión marino-costera </option>
                    <option value="RETRGLACACT"> Retroceso glaciar 2020 </option>
                    <option value="RETRGLAC30"> Retroceso glaciar 2030 </option>
                    <option value="RETRGLAC50"> Retroceso glaciar 2050 </option>
                    <option value="SEQACT"> Cambio en condiciones de aridez 2020 </option>
                    <option value="SEQ30"> Cambio en condiciones de aridez 2030 </option>
                    <option value="SEQ50"> Cambio en condiciones de aridez 2050 </option>
                </select>
                <button id="cargar">Cargar Seleccionado</button>
                <br><br>
                </center>
              </div>
              <div id="loader" class="text-center">Cargando...</div>
        </div>
        
    </div>

    
    <div class="content">
      <p>Continuar para pasar a los impactos</p>
      <a href="{{ route('sede.impactos', ['sede_id' => $sede->id]) }}" class="mt-auto btn btn-continue btn-sm mx-auto">Ir al paso 2</a>
          
  </div>
    @endif
</div>


<script>
    $(document).ready(function() {
      $('#open_add').change(function() {
          console.log("check")
          if(this.checked) {
              $('#div_dir').removeClass('d-none');
              $('#direccion').focus();
          } else {
              $('#div_dir').addClass('d-none');
          }
      });
      $('#load').css("display","none");

      $('#press').on('click',function(){                
          $('#press').css("display","none");
          $('#load').css("display","block");
          });
            $(".autocomplete-google").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{route("placeid")}}',
                        type: 'GET',
                        dataType: "json",
                        data: {
                            inputData: request.term,
                        },
                        success: function(data) {
                            response(data);
                            //console.log(data);
                        }
                    });
                },
                select: function(event, ui) {
                    var placeId = ui.item.id;
                    //getAddressDetails(placeId);
                }
            });

            
            
            
            
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
        function getAddressDetails(placeId) {
        $.ajax({
            url: "/address",
            type: 'GET',
            dataType: "json",
            data: {
                placeId: placeId,
            },
            success: function(data) {
                console.log(data);
                $('#latitud').val(data.latitud);
                $('#longitud').val(data.longitud);
                /*
                $('#country').val(data.country);
                $('#city').val(data.locality);
                $('#postcode').val(data.postal_code);
                $('#state').val(data.state);
                $('#street_address_1').val(data.streetNumber);
                $('#street_address_2').val(data.streetName);
                */
            },
            catch: function(error) {
                console.log('error');
            }
        });

        
    }
</script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


<script>
    
   
  const geojsonFiles = [
			{ id:  1, color: "#008000", riesgo:1, visible: true, grupo:"INUND30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_30_DN1_truncado.json" },
			{ id:  2, color: "#FFFFCC", riesgo:2, visible: true, grupo:"INUND30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_30_DN2_truncado.json" },
			{ id:  3, color: "#FF8000", riesgo:3, visible: true, grupo:"INUND30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_30_DN3_truncado.json" },
			{ id:  4, color: "#FF0000", riesgo:4, visible: true, grupo:"INUND30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_30_DN4_truncado.json" },
			{ id:  5, color: "#008000", riesgo:1, visible: true, grupo:"INUND50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_50_DN1_truncado.json" },
			{ id:  6, color: "#FFFFCC", riesgo:2, visible: true, grupo:"INUND50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_50_DN2_truncado.json" },
			{ id:  7, color: "#FF8000", riesgo:3, visible: true, grupo:"INUND50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_50_DN3_truncado.json" },
			{ id:  8, color: "#FF0000", riesgo:4, visible: true, grupo:"INUND50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_50_DN4_truncado.json" },
			{ id:  9, color: "#008000", riesgo:1, visible: true, grupo:"INUNDACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_act_1_truncado.json" },
			{ id: 10, color: "#FFFFCC", riesgo:2, visible: true, grupo:"INUNDACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_act_2_truncado.json" },
			{ id: 11, color: "#FF8000", riesgo:3, visible: true, grupo:"INUNDACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_act_3_truncado.json" },
			{ id: 12, color: "#FF0000", riesgo:4, visible: true, grupo:"INUNDACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Inund_act_4_truncado.json" },
			{ id: 13, color: "#008000", riesgo:1, visible: true, grupo:"MOVMASA30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_30_DN1_truncado.json" },
			{ id: 14, color: "#FFFFCC", riesgo:2, visible: true, grupo:"MOVMASA30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_30_DN2_truncado.json" },
			{ id: 15, color: "#FF8000", riesgo:3, visible: true, grupo:"MOVMASA30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_30_DN3_truncado.json" },
			{ id: 16, color: "#FF0000", riesgo:4, visible: true, grupo:"MOVMASA30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_30_DN4_truncado.json" },
			{ id: 17, color: "#008000", riesgo:1, visible: true, grupo:"MOVMASA50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_50_DN1_truncado.json" },
			{ id: 18, color: "#FFFFCC", riesgo:2, visible: true, grupo:"MOVMASA50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_50_DN2_truncado.json" },
			{ id: 19, color: "#FF8000", riesgo:3, visible: true, grupo:"MOVMASA50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_50_DN3_truncado.json" },
			{ id: 20, color: "#FF0000", riesgo:4, visible: true, grupo:"MOVMASA50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_50_DN4_truncado.json" },
			{ id: 21, color: "#008000", riesgo:1, visible: true, grupo:"MOVMASAACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_act_DN1_truncado.json" },
			{ id: 22, color: "#FFFFCC", riesgo:2, visible: true, grupo:"MOVMASAACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_act_DN2_truncado.json" },
			{ id: 23, color: "#FF8000", riesgo:3, visible: true, grupo:"MOVMASAACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_act_DN3_truncado.json" },
			{ id: 24, color: "#FF0000", riesgo:4, visible: true, grupo:"MOVMASAACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/mov_masa_act_DN4_truncado.json" },
			{ id: 25, color: "#008000", riesgo:1, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionMuyBajo_truncado.json" },
			{ id: 26, color: "#FFFFCC", riesgo:2, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionBajo_truncado.json" },
			{ id: 27, color: "#FF8000", riesgo:3, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionMedio_truncado.json" },
			{ id: 28, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionAlto_truncado.json" },
			{ id: 29, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionAlto_truncado.json" },		
			{ id: 53, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p_ErosionCritico_truncado.json" },		
			{ id: 54, color: "#008000", riesgo:1, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionMuyBajo_truncado.json" },
			{ id: 55, color: "#FFFFCC", riesgo:2, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionBajo_truncado.json" },
			{ id: 56, color: "#FF8000", riesgo:3, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionMedio_truncado.json" },
			{ id: 57, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionAlto_truncado.json" },
			{ id: 58, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionAlto_truncado.json" },		
			{ id: 59, color: "#FF0000", riesgo:4, visible: true, grupo:"NIVERO2", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/ErosMar_p2_ErosionCritico_truncado.json" },
			{ id: 30, color: "#FFFFCC", riesgo:2, visible: true, grupo:"RETRGLAC30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/RetrGlac_30_DN2_truncado.json" },
			{ id: 31, color: "#FF8000", riesgo:3, visible: true, grupo:"RETRGLAC30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/RetrGlac_30_DN3_truncado.json" },
			{ id: 32, color: "#FF0000", riesgo:4, visible: true, grupo:"RETRGLAC30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/RetrGlac_30_DN4_truncado.json" },
			{ id: 36, color: "#FF0000", riesgo:4, visible: true, grupo:"RETRGLAC50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/RetrGlac_50_DN4_truncado.json" },
			{ id: 37, color: "#008000", riesgo:1, visible: true, grupo:"RETRGLACACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/RetrGlac_act_DN1_truncado.json" },
			{ id: 41, color: "#008000", riesgo:1, visible: true, grupo:"SEQ30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_30_DN1_truncado.json" },
			{ id: 42, color: "#FFFFCC", riesgo:2, visible: true, grupo:"SEQ30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_30_DN2_truncado.json" },
			{ id: 43, color: "#FF8000", riesgo:3, visible: true, grupo:"SEQ30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_30_DN3_truncado.json" },
			{ id: 44, color: "#FF0000", riesgo:4, visible: true, grupo:"SEQ30", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_30_DN4_truncado.json" },
			{ id: 45, color: "#008000", riesgo:1, visible: true, grupo:"SEQ50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_50_DN1_truncado.json" },
			{ id: 46, color: "#FFFFCC", riesgo:2, visible: true, grupo:"SEQ50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_50_DN2_truncado.json" },
			{ id: 47, color: "#FF8000", riesgo:3, visible: true, grupo:"SEQ50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_50_DN3_truncado.json" },
			{ id: 48, color: "#FF0000", riesgo:4, visible: true, grupo:"SEQ50", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_50_DN4_truncado.json" },
			{ id: 49, color: "#008000", riesgo:1, visible: true, grupo:"SEQACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_act_DN1_truncado.json" },
			{ id: 50, color: "#FFFFCC", riesgo:2, visible: true, grupo:"SEQACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_act_DN2_truncado.json" },
			{ id: 51, color: "#FF8000", riesgo:3, visible: true, grupo:"SEQACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_act_DN3_truncado.json" },
			{ id: 52, color: "#FF0000", riesgo:4, visible: true, grupo:"SEQACT", file: "https://cosmosplataform-clients.s3.us-east-2.amazonaws.com/spike/smallsize/Seq_act_DN4_truncado.json" }
        ];

        /*
    function initMap() {
	  //Inicializacion de mapa
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: { lat: -12.0464, lng: -77.0428 },
        mapTypeId: 'satellite'
      });
      //Inicializacion de marcador
      //const initialPosition = { lat: -12.0464, lng: -77.0428 };
      const initialPosition = { lat: {{$sede->latitud}}, lng: {{$sede->longitud}} };
      marker = new google.maps.Marker({
        position: initialPosition,
        map: map,
        title: 'Ubicación de coordenadas',
        draggable: true
      });
      
      //Inicializacion de evento de marcador
      
      google.maps.event.addListener(marker, 'dragend', function() {
        const position = marker.getPosition();
        geocodeLatLng(position.lat(), position.lng());
        const point = turf.point([position.lng(), position.lat()]);
        checkPointInPolygons(point);
      });

      map.setCenter(initialPosition);
      //Inicializacion de radio button
	    document.querySelectorAll('input[name="searchType"]').forEach((input) => {
        input.addEventListener('change', toggleSearchType);
      });
      
      moveMarkerTo({{$sede->latitud}}, {{$sede->longitud}});
    }

    function loadAllGeoJsonFiles() {
	  clearMap();
	  totalMapas();
      showLoader(`Cargando multipolígonos 1 de total de ${contadorCargaTotal}...`);
      geojsonFiles.forEach((geojsonFile, index) => {
		var tipoMapa = document.getElementById('tipoMapa');
		if(geojsonFile.grupo==tipoMapa.value){
        fetch(geojsonFile.file)
          .then(response => response.json())
          .then(data => {
            data.features.forEach(feature => {
              feature.properties.color = geojsonFile.color;
            });
            loadGeoJson(data, index);
            //hideLoader();
          })
          .catch(error => {
            console.error('Error loading GeoJSON:', error);
            //hideLoader();
          });
		}
      });
    }
	
    function addRowToTable(geojsonFile, index) {
	  contadorCarga++;
	  if(contadorCarga==contadorCargaTotal){
	    hideLoader();
	  }else{
	    showLoader(`Cargando multipolígonos ${contadorCarga + 1} de total de ${contadorCargaTotal}...`);
	  }
    }
	
	function totalMapas(){
	  geojsonFiles.forEach((geojsonFile, index) => {
		if(geojsonFile.grupo==tipoMapa.value){
		  contadorCargaTotal++;
		}
	  });
	}

    function loadGeoJson(geojson, index) {
      geojsonDataList[index] = geojson;
      if (geojsonLayerList[index]) {
        geojsonLayerList[index].setMap(null);
      }

      const geojsonLayer = new google.maps.Data();
      geojsonLayer.addGeoJson(geojson);
      geojsonLayer.setStyle(function(feature) {
        const color = feature.getProperty('color') || '#FF0000';
        return {
          fillColor: color,
          strokeColor: color,
          strokeWeight: 2,
          fillOpacity: 0.5
        };
      });
      geojsonLayer.setMap(map);
      geojsonLayerList[index] = geojsonLayer;

      const initialPoint = turf.point([marker.getPosition().lng(), marker.getPosition().lat()]);
      checkPointInPolygons(initialPoint);
      geojsonFiles[index].visible = true;
	  addRowToTable(geojsonFiles[index], index);
    }
	
    function handleCoordinateInput() {
      if (!isNaN(lat) && !isNaN(lng)) {
        moveMarkerTo(lat, lng);
      }
    }

    function checkPointInPolygons(point) {
      let isInside = false;
      let containingPolygonIndex = -1;
      geojsonDataList.forEach((geojson, index) => {
        turf.featureEach(geojson, function(currentFeature) {
          if (currentFeature.geometry.type === 'MultiPolygon' || currentFeature.geometry.type === 'Polygon') {
            if (turf.booleanPointInPolygon(point, currentFeature)) {
              isInside = true;
              containingPolygonIndex = index;
            }
          }
        });
      });
      let infoText = isInside ? `Coordenada dentro de Capa: Sí, ubicado en la capa ${containingPolygonIndex + 1}` : "Coordenada dentro de Capa: No";
	  //highlightRow(containingPolygonIndex+1);
    }

    function moveMarkerTo(lat, lng) {
      const newPosition = { lat: lat, lng: lng };
      marker.setPosition(newPosition);
      map.setCenter(newPosition);
      map.setZoom(14);
      const point = turf.point([lng, lat]);
      checkPointInPolygons(point);
    }

    function clearMap() {
      geojsonLayerList.forEach(layer => {
        layer.setMap(null);
      });
      geojsonDataList = [];
      geojsonLayerList = [];
	  contadorCarga = 0;
	  contadorCargaTotal = 0;
    }

    function showLoader(message) {
      const loader = document.getElementById('loader');
      loader.textContent = message;
      loader.style.display = 'block';
    }

    function hideLoader() {
      const loader = document.getElementById('loader');
      loader.style.display = 'none';
    }
	
    function geocodeLatLng(lat, lng) {
      const geocoder = new google.maps.Geocoder();
      const latlng = { lat: parseFloat(lat), lng: parseFloat(lng) };
      geocoder.geocode({ location: latlng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            //document.getElementById('coordinates-address').textContent = results[0].formatted_address;
            //document.getElementById('address-input').value = results[0].formatted_address;
          } else {
            //document.getElementById('coordinates-address').textContent = "No results found";
          }
        } else {
          //document.getElementById('coordinates-address').textContent = "Geocoder failed due to: " + status;
        }
      });
    }
	
    function centerMapOnMarker() {
      const position = marker.getPosition();
      map.setCenter(position);
    }
	
    window.onload = initMap;
    
    */
    let map = L.map('map').setView([{{$sede->latitud}}, {{$sede->longitud}}], 14);

    //const initialPosition = { lat: {{$sede->latitud}}, lng: {{$sede->longitud}} };

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

let marker = L.marker([{{$sede->latitud}}, {{$sede->longitud}}], {draggable: true}).addTo(map);

//moveMarkerTo(-11.118135, -77.160903);

// Evento dragend para actualizar bindPopup
marker.on('dragend', function(event) {
    var marker = event.target;
    var position = marker.getLatLng();
    marker.bindPopup("Marcador movido a: " + position.lat.toFixed(5) + ", " + position.lng.toFixed(5)).openPopup();
});

function moveMarkerTo(lat, lng) {
    marker.setLatLng([lat, lng]).addTo(map).bindPopup("Marcador movido a: " + lat + ", " + lng).openPopup();
    map.setView([lat, lng], 14);
}

document.getElementById('cargar').addEventListener('click', () => {
    let tipoMapa = document.getElementById('tipoMapa').value;
    loadGeojsonFiles(tipoMapa);
});

document.getElementById('cargarTodo').addEventListener('click', () => {
    loadGeojsonFiles('todo');
});

function openDatabase() {
    return new Promise((resolve, reject) => {
        let request = indexedDB.open("GeojsonDB", 1);
        request.onupgradeneeded = event => {
            let db = event.target.result;
            if (!db.objectStoreNames.contains("geojsonFiles")) {
                db.createObjectStore("geojsonFiles", { keyPath: "id" });
            }
        };
        request.onsuccess = event => {
            resolve(event.target.result);
        };
        request.onerror = event => {
            reject(event.target.error);
        };
    });
}

function storeGeojsonFile(db, file) {
    return fetch(file.file)
        .then(response => response.json())
        .then(data => {
            return new Promise((resolve, reject) => {
                let transaction = db.transaction("geojsonFiles", "readwrite");
                let store = transaction.objectStore("geojsonFiles");
                store.put({ id: file.id, data: data });
                transaction.oncomplete = () => resolve();
                transaction.onerror = event => reject(event.target.error);
            });
        });
}

function getGeojsonFile(db, id) {
    return new Promise((resolve, reject) => {
        let transaction = db.transaction("geojsonFiles", "readonly");
        let store = transaction.objectStore("geojsonFiles");
        let request = store.get(id);
        request.onsuccess = () => {
            resolve(request.result ? request.result.data : null);
        };
        request.onerror = event => {
            reject(event.target.error);
        };
    });
}

async function loadGeojsonFiles(grupo) {
clearMap();
    let db = await openDatabase();
    //let files = geojsonFiles.filter(file => file.grupo === grupo);
let files = null;
if(grupo=='todo'){
files = geojsonFiles;
}else{
files = geojsonFiles.filter(file => file.grupo === grupo);
}
    let layers = [];

    const loadAndAddLayer = async (file, index) => {
        let data = await getGeojsonFile(db, file.id);
        if (!data) {
            await storeGeojsonFile(db, file);
            data = await getGeojsonFile(db, file.id);
        }

        let layer = L.geoJSON(data, {
            style: { color: file.color },
        }).addTo(map);
showLoader('Cargando ' + (index+1) + ' de ' + files.length);																
        return layer;
    };

    try {
        const promises = files.map((file, index) => loadAndAddLayer(file, index));
        const layers = await Promise.all(promises)
  .then(() => {
    showLoader('Carga completa de las capas.');
    // Cambiar la capa base a ESRI World Imagery
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
      maxZoom: 19,
      attribution: 'ESRI World Imagery'
    }).addTo(map);
    hideLoader();
  });
        checkMarkerPosition(marker.getLatLng().lat, marker.getLatLng().lng);
    } finally {
        document.getElementById('loader').style.display = 'none';
    }
}

function updateLoader(current, total) {
    document.getElementById('loader').innerText = `Cargando... ${current} de ${total}`;
    document.getElementById('loader').style.display = current === total ? 'none' : 'block';
}

function clearMap() {
    map.eachLayer(layer => {
        if (layer instanceof L.GeoJSON) {
            map.removeLayer(layer);
        }
    });
}

function showLoader(message) {
const loader = document.getElementById('loader');
loader.textContent = message;
loader.style.display = 'block';
}

function hideLoader() {
const loader = document.getElementById('loader');
loader.style.display = 'none';
}

  </script>

@endsection