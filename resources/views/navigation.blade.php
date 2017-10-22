<div class="ui top stackable inverted fixed menu">
	
	<a class="item" href="{{ url('users') }}">User Management</a>

	<a class="item">Testimonials</a>
	
	<div class="right menu">
		@if(Auth::check())
			<a href="{{ route('logout') }}" 
				class="item"
				onclick="event.preventDefault(); document.getElementById('signoutForm').submit();"
				>Sign-out
			</a>
			<form id="signoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
			    {{ csrf_field() }}
			</form>
		@else
			<a href="#" class="item">Sign-in</a>
		@endif
	</div>
</div>