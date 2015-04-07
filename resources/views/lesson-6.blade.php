@extends('layouts.lesson')

@section('react')

	<script type="text/jsx">

		var TaskApp = React.createClass({

			getInitialState: function()
			{
				return {
					items: [],
					task: ''
				}
			},

			onChange: function(evt)
			{
				this.setState({
					task: evt.target.value
				});
			},

			addTask: function(evt)
			{
				evt.preventDefault();

				this.setState({
					items: this.state.items.concat([this.state.task]),
					task: ''
				})
			},

			render: function() {
				return (
					<div>
						<h1>My Tasks</h1>
						<TaskList items={this.state.items} />

						<form onSubmit={this.addTask}>
							<input onChange={this.onChange} value={this.state.task} />
							<button>Add Task</button>
						</form>
					</div>
				);
			}

		});

		var TaskList = React.createClass({

			render: function() {

				var displayTask = function displayTask(task)
				{
					return <li>{task}</li>
				}

				return (
					<ul>
						{ this.props.items.map(displayTask) }
					</ul>
				);
			}

		});

		React.render(<TaskApp />, document.body);

	</script>
@stop