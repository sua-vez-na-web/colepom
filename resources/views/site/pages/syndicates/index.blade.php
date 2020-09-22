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
					Sindicatos e Associações
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="container my-3">
	<div class="card p-2">
		<div class="form">
			<form class="form-inline">
				<label class="sr-only" for="inlineFormInputName2">Name</label>
				<input type="text" class="form-control mb-2 mr-sm-2 col-6" id="inlineFormInputName2" placeholder="Pequisar um Parceiro">

				<label class="sr-only" for="inlineFormInputGroupUsername2">Categoria</label>
				<div class="input-group mb-2 mr-sm-2">
					<select name="category_id" id="" class="form-control">
						<option value="">Selecione uma categoria</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{$category->name}}</option>
						@endforeach
						<option value="all">Todas Categorias</option>
					</select>
				</div>
				<button type="submit" class="btn btn-default mb-2">Pesquisar</button>
			</form>
		</div>
		<ul class="list-group list-group-flush mt-2">
			@foreach($syndicates as $syndicate)
			<div class="partner">
				<a href="" class="list-group-item list-group-item-action">{{$syndicate->name}}</a>
			</div>
			@endforeach
		</ul>
	</div>
</div>
@endsection