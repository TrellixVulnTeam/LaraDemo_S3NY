@extends('master')

@section('title', $title)
@section('content')
<form class="form-horizontal" role="form" method="POST" action="file/upload" enctype="multipart/form-data">
{!! csrf_field() !!}
	<div class="form-group" >
		<label for="file" class="col-md-4 control-label">請選擇檔案</label>
		<div class="col-md-6">
			<input id="file" type="file" class="form-control" name="source" required>
	</div>
		</div>
	<div class="form-group">
		<div class="col-md-8 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				確認上傳
			</button>
		</div>
	</div>
</form>
@endsection
