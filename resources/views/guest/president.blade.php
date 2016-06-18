@extends('template-guest')

@section('title','Promesses du président')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h2>Toutes les promesses \<small> Agriculture</small></h2>
		</div>
		<div class="col-md-12">
			<form class="form-inline">
			  <div class="form-group col-md-2">
			    <label class="sr-only" for="exampleInputEmail3">Catégorie</label>
			    <select name="categorie" id="categorie" class="form-control" >
			    	<option value="">Aucun</option>
			    	@foreach($categorie as $categorie)
			    		<option value="{{$categorie->designation}}">{{$categorie->designation}}</option>
			    	@endforeach
			    </select>
			  </div>
			  <div class="form-group col-md-5">
			    <label class="sr-only" for="exampleInputPassword3">Secteur</label>
			    <select name="secteur" id="secteur" class="form-control" >
			    	<option value="">Aucun</option>
			    	@foreach($secteurs as $secteur)
			   			<option value="{{$secteur->nom}}">{{$secteur->nom}}</option>
			   		@endforeach
			    </select>
			  </div>
			  <div class="form-group col-md-3">
			   <label class="sr-only" for="exampleInputPassword3">Etat</label>
			   <select name="etat" id="etat" class="form-control" >
			   	<option value="">Aucun</option>
			   	@foreach($etats as $etat)
			   		<option value="{{$etat->designation}}">{{$etat->designation}}</option>
			   	@endforeach
			   </select>
			  </div>
			
			  <button type="submit" class="btn btn-default text-uppercase">Valider</button>
			</form>
		</div>
		<p>&nbsp;</p>
		<div class="col-md-12">
			
			@foreach($engagements as $engagement)
				<div class="row">
				{{--*/ $i=0 /*--}}
				
				<div class="row ligne-engagement ">
					<a data-toggle="collapse" href="#comment{{$engagement->id}}" aria-expanded="false" aria-controls="collapseExample">
					<div class="col-md-8 ">
					<div class="col-md-12 bg-engagement">
						<div class="col-md-12 type-engagement">
							<h5 class="text-uppercase"><strong>{{$engagement->categorie->designation}}</strong></h5>
						</div>
						<div class="col-md-12 intitule-engagement">
							<p style="font-size:16px">{{$engagement->intitule}}</p>
						</div>
						<div class="col-md-12">
							<h5><span class="text-uppercase"><strong>Source :</strong></span> {{$engagement->source}}</h5>
						</div>
					</div>
					</div>
					</a>
					<div class="col-md-4">
					@if(count($engagement->etats) != 0)
						<div class="col-md-8 etat-engagement">
							<div class="col-md-12">
							@foreach($engagement->etats as $etats)
								<div class="col-md-4">
								<a href="#" data-toggle="tooltip" title="{{$etats->designation}}">
									<i class="fa {{$etats->img}} fa-2x text-info" aria-hidden="true" title="{{$etats->designation}}"></i>
								</a>
								</div>
							@endforeach
							</div>
						</div>
					@endif
					</div>
				</div>
				<div class="row ligne-commentaire collapse"  id="comment{{$engagement->id}}">
					<div class="col-md-6 cadre-commentaire">
						@foreach($engagement->etats as $etat)
						<div class="col-md-4">
							<h4>
								<span class="label label-info">
									<i class="fa {{$etat->img}} fa-1x" aria-hidden="true"></i> {{$etat->designation}}
								</span>
							</h4>
						</div>
							@foreach($commentaires as $commentaire)
								@if($commentaire->engagement_etat_id==$etat->pivot->id)
								<div class="col-md-10 col-md-offset-6 ">
									{{--*/ $i=1 /*--}}
									<h4>
										{{$commentaire->titre}}
									</h4>
									<p>{{$commentaire->contenu}}</p>
								</div>
								@endif
							@endforeach
						@endforeach
					</div>
				</div>
				@if($i==1)
					<!-- <div class="row">
						<div class="col-md-12 btn-ligne-detail">
							<p>
								<a class="btn btn-default" role="button" >Détails &raquo;</a>
							</p>
						</div>
					</div> -->
				@endif
				</div>
			@endforeach
			<div class="col-md-4"></div>
		</div>
	</div>
	@foreach($engagements as $engagement)
		{{$engagement->engagement_etat}}
	@endforeach
	{{ $engagements->links() }}
@endsection