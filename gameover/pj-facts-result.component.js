
var GameResult = React.createClass ({
    getInitialState: function () {
        return {
            locked: 0,
            total: 0
        }
    },
    
    componentWillMount: function () {
        this._startRefreshing();
        var audio = new Audio("../sound/end.mp3");
        console.log("end sound!");
        audio.play();
    },
    
    getResults: function () {
        $.ajax({
            url: 'getFactsResult.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.locked = data.count;
                this.setState({locked:this.state.locked});
                $.ajax({
                    url: 'countFacts.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        this.state.total = data.count;
                        this.setState({total:this.state.total});
                    }.bind(this)
                });
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'getFactsResult.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.locked = data.count;
                this.setState({locked:this.state.locked});
                $.ajax({
                    url: 'countFacts.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        this.state.total = data.count;
                        this.setState({total:this.state.total});
                        setTimeout(this._startRefreshing, 1000);
                    }.bind(this)
                });
            }.bind(this)
        })
    },
    
    render: function () {
        return (
            this.state.locked > 0 ? 
            <div>
                <div className="h-counter greyyyy">Fail</div>
                <div className="h-web-addr">{this.state.total-this.state.locked}/{this.state.total}</div>
            </div>
            :
            <div>
                <div className="h-counter redddd">Success</div>
                <div className="h-web-addr">{this.state.total}/{this.state.total}</div>
            </div>
        );
    }
});

ReactDOM.render(
    <GameResult />,
    document.getElementById('h-result')
);