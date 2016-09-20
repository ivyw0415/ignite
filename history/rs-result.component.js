var WinResult = React.createClass ({
    getInitialState: function () {
        return {
            unlocked: 0,
            total: 0
        };
    },
    
    getResult: function () {
        $.ajax({
            url: '../gameover/countFacts.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.total = data.count;
                this.setState({total: this.state.total});
                $.ajax({
                    url: '../gameover/getFactsResult.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        this.state.unlocked = this.state.total - data.count;
                        this.setState({unlocked: this.state.unlocked});
                    }.bind(this)
                })
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this.getResult();
    },
    
    render: function () {
        return (
            <div>
            <div className='col-xs-12' id='result'>
            {(this.state.unlocked < this.state.total
                ?
                'Game Over!':'You Win!')}
            </div>
            <div className='col-xs-12'>
            <span id='num-achievements'>
            {this.state.unlocked}
            </span>/
            {this.state.total} key facts were unlocked in total
            </div>
            </div> 
        );
    }
});

ReactDOM.render(
    <WinResult />,
    document.getElementById('winRes')
);