@extends('layouts.lesson')

@section('react')
	<script type="text/jsx">

		var Avatar = React.createClass({

			getDefaultProps: function()
			{
				return {
					path: "http://placehold.it/300x300"
				};
			},

			render: function() {
				return (
					<div>
						<a href={this.props.path}>
							<img src={this.props.path} />
						</a>
					</div>
				);
			}

		});

		React.render(<Avatar path="http://placehold.it/500x500"/>, document.body);

	</script>
@stop