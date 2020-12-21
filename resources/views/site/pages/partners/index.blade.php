@extends('site.layouts.template')

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
					Explorar Parceiros
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5">
	<!-- <div class="row align-items-center my-4"> -->
	<!-- <div class="col-md-8">
            <div class="form-row">
                <div class="form-group col-8">
                    <input type="text" class="form-control " placeholder="Digite para pesquisar...">
                </div>
                <div class="form-group col">
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="fas fa-search"></i>
                        Pesquisar
                    </button>
                </div>
            </div>
        </div> -->
	<!-- <div class="col-md-12">
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
		</div> -->
	<!-- </div> -->
	<div class="section pesquisa-section row">
		<div class="col-md-3">
			@include('site.layouts._partials._filters')
		</div>
		<div class="col-md-9">
			<div class="row">
				@forelse ($partners as $partner)
				<div class="col-md-4 col-sm-6">
					<a class="cupom-click" href="{{route('site.partner',$partner->id)}}">
						<div class="card p-2">
							<div class="tasfa"></div>
							<div class="black-canvas">
								<img class="cupom-img-top" alt="Parceiro" src="{{$partner->image}}" width="450" height="600">
							</div>
							<!-- <div class="cupom-desconto">{{$partner->discount}}%</div> -->
							<div class="cupom-block">
								<h5 class="cupom-title" data-toggle="tooltip" title="{{ $partner->title }}">
									{{$partner->name}}
								</h5>
							</div>
						</div>
					</a>
				</div>
				@empty
				<p>Nenhum Registro Encontrado.</p>
				@endforelse
			</div>
		</div>
	</div>
</div>

@endsection