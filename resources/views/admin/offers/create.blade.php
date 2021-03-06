@extends('admin.layouts.admin')

@section('content')
    <form class="w-100 col-lg-10 mb-4 d-flex justify-content-center" action=" {{route('admin.offers.store')}} " method="post">
        @method('post')
        @csrf
        <input type="hidden" name="_method" value="POST"/>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header">NUEVA OFERTA</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="nombre">Nombre: *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre de la oferta">

                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_inicio">Fecha Inicio: *</label>
                        <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="fecha_inicio" name="inicio" value="{{ old('inicio') }}" placeholder="Fecha de iniciación de la oferta">

                        @error('inicio')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_final">Fecha Final: *</label>
                        <input type="date" class="form-control @error('final') is-invalid @enderror" id="fecha_final" name="final" value="{{ old('final') }}" placeholder="Fecha de finalización de la oferta">

                        @error('final')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="valor_desc">Valor Descuento:</label>
                        <input type="text" class="form-control @error('descuento_valor') is-invalid @enderror" id="valor_desc" name="descuento_valor" value="{{ old('descuento_valor') }}" placeholder="Valor de descuento para el producto (DECIMAL)">

                        @error('descuento_valor')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="porcentaje_desc">Porcentaje Descuento:</label>
                        <input type="number" class="form-control @error('descuento_porcentual') is-invalid @enderror" id="porcentaje_desc" name="descuento_porcentual" value="{{ old('descuento_porcentual') }}" placeholder="Porcentaje de descuento para el producto">

                        @error('descuento_porcentual')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <legend class="col-form-label">Activa:</legend>
                        <div class="form-check form-check-inline @error('activo') is-invalid @enderror">
                            <input class="form-check-input" type="radio" name="activo" id="activo1" value="1">
                            <label class="form-check-label" for="activo1">Sí</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="activo" id="activo2" value="0">
                            <label class="form-check-label" for="activo2">No</label>
                        </div>

                        @error('activo')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="col-12 d-flex justify-content-end text-center mb-4">
                    <a href="{{ route('admin.offers.index') }}"><div class="btn btn-outline-danger mx-1">Cancelar</div></a>

                    <input class="btn btn-success mx-1" type="submit" name="submit" value="Guardar">
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {

            if( $("#valor_desc").val() ) {
                $("#porcentaje_desc").prop('disabled', true);
            }

            else if ($("#porcentaje_desc").val()){
                $("#valor_desc").prop('disabled', true);
            }

            $("#valor_desc").blur(function () {
                if( $(this).val() ) {
                    $("#porcentaje_desc").prop('disabled', true);
                } else{
                    $("#porcentaje_desc").prop('disabled', false);
                }
            });

            $("#porcentaje_desc").blur(function () {
                if( $(this).val() ) {
                    $("#valor_desc").prop('disabled', true);
                } else{
                    $("#valor_desc").prop('disabled', false);
                }
            })
        });
    </script>
@endsection


