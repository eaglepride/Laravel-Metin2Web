@extends('layouts.master')
@section('top5')
 <table class="table table-hover">
      <button class="btn btn-success" style="width:155px">Jugadores</button><button class="btn btn-warning" style="width:155px">Gremios</button>
        <table class="table">
          <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Reino</th>
                <th>Pais</th>
                </tr>
                  @foreach($rankingtop as $rankingtops)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="/perfil/ver/{{ $rankingtops->name }}">{{ $rankingtops->name }}</a></td>
                <td>{{ $rankingtops->level }}</td>
                <td><img src="../../../img/reino/{{ $rankingtops->empire }}.png" width="20"></td>
                <td><img src="../../../img/country/{{ $rankingtops->zipcode }}.png" width="20"></td>
            </tr>
            @endforeach
          </table>
        </table>
@stop
@section('content')
<script type="text/javascript">
  $(function() {
    $('#favoritesModal').on("show.bs.modal", function (e) {
         $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
         $("#name").html($(e.relatedTarget).data('title'));
         $("#content").html($(e.relatedTarget).data('content'));
         $("#precio").html($(e.relatedTarget).data('prices'));
         $("#precio").html($(e.relatedTarget).data('prices'));
         $("#url_buy").attr("href", '/tienda-de-articulos/'+ $(e.relatedTarget).data('id') +'/comprar/');
    });
});
</script>
<div class="modal fade" id="favoritesModal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close"
          data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"
        id="favoritesModalLabel"></h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td rowspan="3" width="20%"><img src="http://www.uslanmam.com/customavatars1/avatar533620_2.gif" width="100"></td>
            <td> <b><u>Nombre:</u></b> <span id="name"></span></td>
          </tr>
          <tr>
            <td><b><u>Descripción:</u></b> <span id="content"></span></td>
          </tr>
          <tr>
            <td><b><u>Precio:</u></b> <span id="precio"></span> COINS</td>
          </tr>
           <tr>
            <td>
               <a href="" class="btn btn-success btn-sm" id="url_buy"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">SHOP | TIENDA <span id="" style="float:right;">Monedas de Dragon: {{ $coins }}</span></h3>
  </div>
  <div class="panel-body">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-3">
       @foreach($categoria as $categorias)
       <a href="/tienda-de-articulos/categoria/{{ $categorias->classid }}" style="width:100%; margin:1px !important;" class="btn btn-success btn-sm">
       {{ $categorias->classname }}</a>
       @endforeach
       </div>
       <div class="col-md-9">
       @if($mensaje)
          <div class="alert alert-{{ $mensaje[1] }} alert-block">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <ul>
                <i class="fa fa-check-square-o" aria-hidden="true"></i> {{ $mensaje[0] }}
              </ul>
          </div>
        @endif
        <div class="panel panel-default" style="margin-top:-1px;">
          <div class="panel-body">
             @foreach($articulo as $articulos)
           <table class="table">
            <tr>
              <td rowspan="3"><img src="http://www.uslanmam.com/customavatars1/avatar533620_2.gif" width="100"></td>
              <td><b><u>{{ $articulos->name }}</u></b></td>
              <td align="right">Precio: <b>{{ $articulos->prices }}</b> COINS</td>
               </tr>

               <tr >
              <td colspan="3" class="text-right"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-id="{{ $articulos->vnum }}" data-prices="{{ $articulos->prices }}" data-content="{{ $articulos->content }}" data-title="{{ $articulos->name }}" data-target="#favoritesModal" data-url="{{ URL::route('getLocation') }}"><i class="fa fa-search" aria-hidden="true"></i> Ver detalles</button>
               <a href="/tienda-de-articulos/{{ $articulos->vnum }}/comprar/" class="btn btn-warning btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a>
              </td>
            </tr>
          </table>
          @endforeach
          </div>
        </div>
        {{ $articulo->render() }}
      </div>
     </div>
    </div>
    </div>
 </div>
@stop
