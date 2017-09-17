@extends ('layouts.master')
@section ('content')
<div class="col-sm-8 blog-main">
<div class="blog-post">
	
		<h2 class="blog-post-title">
			{{ $post->title }}
			
		</h2>

	<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}<a href="#"> Mark</a></p>

	<p> {{ $post->body }} </p>

	<hr>

	<div class="comments">
		<ul class="list-group">
			@foreach ($post->comments as $comment)
				<li class="list-group-item">
					<strong>
						{{ $comment->created_at->diffForHumans() }} : 
					</strong>
					{{ $comment->body }}
				</li>
			@endforeach
		</ul>
	</div>

	<hr>

	<div class="card">
		<div class="card-block">
			<form method="POST" action="/posts/{{ $post->id }}/comments">
				 {{ csrf_field() }}
				<div class="form-group">
					<textarea name="body" placeholder = "Your comment here." class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>
				</div>
			</form>
			@include ('layouts.errors')
		</div>
	</div>
</div>
	
</div><!-- /.blog-post -->



@endsection       