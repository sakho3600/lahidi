@extends('template-admin')
@section('header-title') 
	Liste des engagements
	<span class="label label-default pull-right">115</span>
@endsection

@section('page-menu')
	<ul>
		<li><h3 class="btn-action-menu"><a href="" class="btn btn-danger">Supprimmer</a></h3></li>
		<li>
			<h3 class="btn-action-menu">
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter</a>
			</h3>
		</li>
		<li>
			<form role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Rechercher un engamgent">
				</div>
			</form>
		</li>
	</ul>
@endsection

@section('content')
	<div class="col-md-12">

		<!-- Modal de d'ajout d'engagement -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		  {!! Form::open(['method' =>'PUT','route' =>['engagement.store']]) !!}
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Nouvel engagement</h4>
		      </div>
		      <div class="modal-body">
		      <div class="row">
		      	<div class="col-md-12">
		      	  <div class="form-group">
		      	    <label for="intitule">Promesse</label>
		      	   <input type="text" class="form-control" id="intitule" placeholder="Intitulé de la promesse" name="intitule">
		      	  </div>
		      	  <div class="form-group">
		      	    <label for="secteur">Secteur</label>
		      	   	<select name="secteur" id="secteur" class="form-control" >
		      	   		<option value="0">Aucun</option>	
		      	   	</select>
		      	  </div>
		      	  <div class="form-group">
		      	    <label for="source">Source</label>
		      	   	<input type="text" class="form-control" id="source" placeholder="Source de la promesse" name="source">
		      	  </div>
		      	  <div class="form-group">
		      	    <label for="note">Note</label>
		      	    <textarea name="note" class="form-control" id="note" placeholder="Note de la promesse"></textarea> 
		      	  </div>
		      	  <div class="form-group">
		      	    <label for="localite">Localité</label>
		      	   <input type="text" class="form-control" id="localite" placeholder="Localite de la promesse" name="localite">
		      	  </div>
		      	</div>  
			  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
		        <div class="pull-right" style="margin-left:5px;">
			        {!! Form::submit('Ajouter',['class'=>'btn btn-success'])!!}
		      	</div>
		      </div>
		    </div>
		    {!! Form::close() !!}
		  </div>
		</div>
		<!-- Tableau de liste des engagements -->
		<div class="table-responsive">
			<form>
				<table class="table">
					<tbody>
						<tr>
							<th>
								<input  type="checkbox" name="layout" id="1" value="option" ng-model="allselect">
							</th>
							<th>Engagement</th>
							<th>Catégorie</th>
							<th>Secteur</th>
							<th>Source</th>
							<th>Date d'ajout</th>
							<th colspan="2">&nbsp;</th>
						</tr>
						<tr>
							<td>
								<input  type="checkbox" name="layout" id="1" value=""  ng-checked="allselect">
							</td>
							<td>Un étudiant une tablette</td>
							<td>Promesse électorale</td>
							<td>Enseignement supérieur</td>
							<td>Programme de gouvernance 2015-2020</td>
							<td>08/06/2016</td>
							<td class="">
								<a href="" class="btn-action" data-toggle="modal" data-target="#editModal">
									<i class="fa fa-edit fa-1x" aria-hidden="true"></i>
								</a>
							</td>
							<td>
								<a href="" class="btn-action" data-toggle="modal" data-target="#deleteModal">
									<i class="fa fa-trash fa-1x" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
						
						
						<!-- Modal de confirmation de suppression d'engagement -->
						<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Suppression d'engagement</h4>
						      </div>
						      <div class="modal-body">
						        Voulez-vous vraimment supprimer l'engagement <strong></strong> ?
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
						        <div class="pull-right" style="margin-left:5px;">
							        {!! Form::open(['method' =>'delete','route' =>['engagement.destroy',1]]) !!}
							        	<input type="hidden" name="action" value='suppression'/>
							        	{!! Form::submit('Supprimer',['class'=>'btn btn-danger'])!!}
							      	{!! Form::close() !!}
						      	</div>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- Modal de modification d'appréciation -->
						<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						  {!! Form::open(['method' =>'PUT','route' =>['engagement.update',1]]) !!}
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Modification d'engagement</h4>
						      </div>
						      <div class="modal-body">
						      <div class="row">
						      
							  </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
						        <div class="pull-right" style="margin-left:5px;">
							        {!! Form::submit('Enregistrer',['class'=>'btn btn-success'])!!}
						      	</div>
						      </div>
						    </div>
						    {!! Form::close() !!}
						  </div>
						</div>
					</tbody>
				</table>
			</form>
		</div>
	</div>
@endsection