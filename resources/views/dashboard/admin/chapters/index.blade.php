@extends('layouts.dashboard')
@section('content')
<section class="content-header">
  <h1>
    Daftar Chapter
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard" aria-hidden="true"></i>Admin Dashboard</a></li>
    <li class="active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage Chapters</li>
  </ol>
</section>

<section class="content container-fluid">
	@if(Session::get('Success'))
      <div class="row">
          <div id="alert" class="alert alert-success col-lg-10 col-lg-offset-1 col-xs-12 text-center" role="alert">
            {{ Session::get('Success') }}
          </div>
      </div>
    @endif

    @if(Session::get('Error'))
      <div class="row">
          <div id="alert" class="alert alert-danger col-lg-10 col-lg-offset-1 col-xs-12 text-center" role="alert">
            {{ Session::get('Error') }}
          </div>
      </div>
    @endif

    <div class="row">
    	<div class="col-xs-12">
    		<div class="box">
    			<div class="box-header with-border">
    				<h3 class="box-title">Chapters</h3>
    			</div>
    			<div class="box-body table-bordered table-responsive">
          @if(count($chapters) > 0)
    				<table class="table table-hover">
    					<thead>
    						<th>Chapter</th>
                <th>Novel</th>
                <th>Fan Translation</th>
    						<th>Action</th>
    					</thead>
    					<tbody>
    						@foreach($chapters as $chapter)
    						<tr>
    							<td>{{ $chapter->chapter }}</td>
                  <td>{{ $chapter->novels->judul_novel }}</td>
                  <td>{{ $chapter->ft->nama_ft }}</td>
    							<td>
      							<a href="{{ route('admin.chapter.edit', ['id' => $chapter->id]) }}" class="btn btn-primary btn-sm">
  									  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
  									</a>
                    <a href="{{ $chapter->url }}" target="_blank" class="btn btn-primary btn-sm">
                      <i class="fa fa-eye" aria-hidden="true"></i> Lihat
                    </a>
  									<button role="links" class="btn btn-danger btn-sm" data-href="{{ route('admin.chapter.delete', ['id' => $chapter->id]) }}" data-toggle="modal" data-target="#modal1">
  										<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus
  									</button>
    							</td>
    						</tr>
    						@endforeach
    					</tbody>
    				</table>
    			</div>
    			<div class="box-footer clearfix text-center">
          	{{ $chapters->links() }}
        	</div>
          @else
          <div class="alert alert-info text-center">
            <p>Belum ada satupun chapter didaftarkan pada website ini</p>
          </div>
          @endif
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-xs-12">
    		<a href="{{ route('admin.chapter.add') }}" class="btn btn-primary btn-lg pull-right" style="margin-right: 12px">Tambah Chapter</a>
    	</div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      	</div>
	  	<div class="modal-body">
	  		Yakin ingin menghapus data ini?	
	  	</div>
	  	<div class="modal-footer">
	    	<button type="button" class="btn btn-danger" data-dismiss="modal">Gak jadi</button>
	    	<a role="button" class="btn btn-success btn-ok">Iya</a>
	  	</div>
    </div>
  </div>
</div>
@endsection

@section('plugin-js')
<script type="text/javascript">
	$('#modal1').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>

<script type="text/javascript">
	$("#alert").fadeTo(2000, 500).slideUp(500, function(){
	    $("#alert").slideUp(1000);
	});
</script>
@endsection