@extends('layouts.lesson')

@section('react')
	<script type="text/jsx">

		var HelloWorld = React.createClass({

			render: function() {
				return <div>Hello World</div>
			}

		});

		React.render(<HelloWorld />, document.body);

	</script>
@stop