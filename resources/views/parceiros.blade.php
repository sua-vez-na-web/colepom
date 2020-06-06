@extends('template')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="nav-title">
				<div class="black-canvas">
					<img class="d-block w-100" alt="Carousel Bootstrap First" src="https://images.unsplash.com/photo-1510130315046-1e47cc196aa0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=42549827c6ab513e2e0d86208749e05e&auto=format&fit=crop&w=1050&q=80">
					<div class="carousel-shadow"></div>
				</div>
				<div class="container nav-container">
					<h1 class="nav-caption">
						Parceiros
					</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="section pesquisa-section row">
			<div class="col-md-3">
				<div class="pesquisa-box">
				{!! Form::open(['route'=>'parceirosCat', 'method'=>'post']) !!}
						<div class="form-row">
							<div class="form-group col-8">
								<input type="text" class="form-control buscar-input" placeholder="Buscar">
							</div>
							<div class="form-group col">
								<button type="submit" class="btn btn-light-colored">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
						@foreach ($categorias as $categoria)						
						<div class="form-group">
							<label for="checkbox" class="control-label">{{$categoria->PAC_NOME}}</label>
							<div class="colored-checkbox-list">
							@foreach ($categoria->getSubcategorias() as $subcategoria)
								<label class="checkbox-block">{{$subcategoria->SPA_NOME}}
									<input type="checkbox"  name="subcategorias[]" class="form-check-input" value="{{$subcategoria->SSC_ID}}">
									<span class="checkmark"></span>
								</label>
								@endforeach	
							</div>
						</div>
						@endforeach
						
						<div class="form-group submit-box">
							<button type="submit" class="btn btn-block btn-light-colored">
								Buscar
							</button>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			<div class="col-md-9">
				<div class="text-right">
					<div class="ordenador">
						<select>
							<option value="0" selected="selected" disabled>Ordenar por:</option>
							<option value="1">Maior desconto</option>
							<option value="2">Menor desconto</option>
							<option value="3">De A até Z</option>
							<option value="4">De Z até A</option>
						</select>
					</div>
				</div>
				<div class="row">
				@foreach ($parceiros as $parceiro)
					<div class="col-md-4 col-sm-6">
						<a class="cupom-click" href="{{route('parceiro',['id' =>$parceiro->PAR_ID])}}">
							<div class="parceiro">
								<div class="black-canvas">
									<img class="cupom-img-top" alt="Parceiro" src="{{ asset($parceiro->PAR_LOGO) }}" width="450" height="600">
								</div>
								<div class="cupom-block">
									<div class="cupom-place">
										<div class="map-marker">
										</div>
										<div class="cupom-place-text">
											<span class="cupom-parceiro" data-toggle="tooltip" title="{{ $parceiro->PAR_FANTASIA }}">{{ $parceiro->PAR_FANTASIA }}</span>
											<br>
											<span class="cupom-local" data-toggle="tooltip" title="MUNICIPIO, BAIRRO">MUNICIPIO, BAIRRO</span>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
				<div class="text-center">
					<a href="#" class="btn colored">Ver mais</a>
				</div>
			</div>
		</div>
	</div>
@endsection