@extends('layouts.lesson')

@section('react')

	<script type="text/jsx;harmony=true">

		var Counter = React.createClass({

			getInitialState: function() {
				return {
					count: 0
				};
			},

			add: function() {
				var count = this.state.count + 1;

				this.setState({ count });
			},

			subtract: function() {

				var count = this.state.count - 1;

				this.setState({ count });
			},

			render: function() {
				return (
					<div>
						<h1>Counter: {this.state.count}</h1>

						<button onClick={this.add}>Add 1</button>
						<button onClick={this.subtract}>Subtract 1</button>
					</div>
				);
			}

		});

		React.render(<Counter />, document.body);

	</script>
@stop