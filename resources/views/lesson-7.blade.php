@extends('layouts.lesson')

@section('react')

	<div id="app"></div>

	<script type="text/jsx;harmony=true">

		var Gist = React.createClass({

			render: function() {
				return (
					<div>
						{this.props.username}s last gist is <a href={this.props.url} target="_blank">here</a>.
					</div>
				);
			}

		});

		var GistAddForm = React.createClass({

			getInitialState: function()
			{
				return {
					text: ''
				}
			},

			onChange: function(e)
			{
				this.setState({ text: e.target.value });
			},

			addGist: function(e)
			{
				e.preventDefault();

				this.props.onAdd(this.state.text);
				this.setState({ text: '' });
			},

			render: function() {
				return (
					<form className="form" onSubmit={this.addGist}>
						<input type="text" value={this.state.text} onChange={this.onChange} placeholder="Type a github username" />
						<button>Fetch lastest Gist</button>
					</form>
				);
			}

		});
		var GistBox = React.createClass({

			getInitialState: function() {
				return {
					gists: []
				};
			},

			addGist: function(username)
			{
				var url = `https://api.github.com/users/${username}/gists`;

				$.get(url, function(result)
				{
					var username = result[0].owner.login;
					var url = result[0].html_url;

					var gists = this.state.gists.concat({ username, url });

					this.setState({ gists });
				}.bind(this));
			},

			render: function() {
				var newGist = function(gist)
				{
					return <Gist username={gist.username} url={gist.url} />
				};

				return (
					<div>
						<h1>GistBox</h1>

						<GistAddForm onAdd={this.addGist}/>

						{ this.state.gists.map(newGist) }
					</div>
				);
			}

		});

		React.render(<GistBox />, document.getElementById('app'));

	</script>
@stop